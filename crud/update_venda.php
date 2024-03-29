<?php
	// Arquivo conexao.php
	require_once '../conexao/conexao.php'; 
	// Arquivo classe_usuario.php
	require_once '../classe/classe_usuario.php';
	// Inicio da sessao
	session_start();
	// Se existir $_SESSION['id_usuario'] e nao for vazio
	if((isset($_SESSION['id_usuario'])) && (!empty($_SESSION['id_usuario']))){
		// Mensagem
		echo "";
	// Se nao
	} else {
		// Retorna para a pagina index.php
		echo "<script> alert('Ação inválida, entre no sistema da maneira correta.'); location.href='/web/index.php' </script>";
		die;
	}
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> UPDATE | VENDA </title>
	<link rel="stylesheet" href="/web/css/css.css">
</head>
<body>
	<?php
		// Se existir o botao de Atualizar
		if(isset($_POST['Atualizar'])){
			// Especifica a variavel
			$cd_venda = intval($_POST['cd_venda']);
			$cd_produto = intval($_POST['cd_produto']);
			$cd_funcionario = intval($_POST['cd_funcionario']);
			$cd_cliente = intval($_POST['cd_cliente']);
			$valor_item = floatval($_POST['valor_item']);
			$quantidade = intval($_POST['quantidade']);
			$valor_venda = floatval(($valor_item * $quantidade));
			$calculo_reposicao = $quantidade_antiga = $quantidade_produto_antiga = $quantidade_nova = 0;

			// Se a quantidade ou valor do item for menor/igual a zero
			if ($quantidade <= 0 || $valor_item <= 0) { 
				echo "A quantidade ou valor do produto não pode ser igual ou menor que zero, refaça novamente a operação.";
				echo '<p><a href="../form_crud/form_update_venda.php/#atu_ven" 
				title="Refazer operação"><button>Botão refazer operação</button></a></p>';
				exit;
			}

			// Se a atualização for possível de realizar
			try {

				// Tabela VENDA
				// Quantidade inicial na tabela venda
				$procurar_produto = "SELECT quantidade FROM venda WHERE cd_venda = :cd_venda LIMIT 1";
				$busca_registro = $conexao->prepare($procurar_produto);
				$busca_registro->bindValue(':cd_venda', $cd_venda);
				$busca_registro->execute();
				$linha = $busca_registro->fetch(PDO::FETCH_ASSOC);
				$quantidade_antiga = intval($linha['quantidade']); // quantidade antiga venda

				// Buscar a quantidade antiga da tabela produto
				$procura_quantidade_produto_antiga = "SELECT quantidade FROM produto WHERE cd_produto = :cd_produto LIMIT 1";
				$busca_registro_produto = $conexao->prepare($procura_quantidade_produto_antiga);
            	$busca_registro_produto->bindValue(':cd_produto', $cd_produto);
            	$busca_registro_produto->execute();
            	$linha_produto = $busca_registro_produto->fetch(PDO::FETCH_ASSOC);
				$quantidade_produto_antiga = intval($linha_produto['quantidade']); 
				
				// Metodo que inicializa a(s) transacao(oes)
				$conexao->beginTransaction();
				// Query que faz a atualizacao
				$atualizacao = "UPDATE venda SET cd_produto = :cd_produto, 
				cd_funcionario = :cd_funcionario, cd_cliente = :cd_cliente, 
				valor_item = :valor_item, quantidade = :quantidade, 
				valor_venda = :valor_venda WHERE cd_venda = :cd_venda";
				// $atualiza_dados recebe $conexao que prepare a operacao de atualizacao
				$atualiza_dados = $conexao->prepare($atualizacao);
				// Vincula um valor a um parametro
				$atualiza_dados->bindValue(':cd_venda', $cd_venda);
				$atualiza_dados->bindValue(':cd_produto', $cd_produto);
				$atualiza_dados->bindValue(':cd_funcionario', $cd_funcionario);
				$atualiza_dados->bindValue(':cd_cliente', $cd_cliente);
				$atualiza_dados->bindValue(':valor_item', $valor_item);
				$atualiza_dados->bindValue(':quantidade', $quantidade);
				$atualiza_dados->bindValue(':valor_venda', $valor_venda);
				// Executa a operacao
				$atualiza_dados->execute();

				// Tabela PRODUTO
				// Havera retirada de produto (caso a nova quantidade seja menor que a antiga) 
				if ($quantidade <= $quantidade_antiga) {
					$quantidade_nova = $quantidade_produto_antiga + ($quantidade_antiga - $quantidade);
					$calculo_reposicao = "UPDATE produto SET quantidade = :quantidade_nova WHERE cd_produto = :cd_produto";		
				// Havera reposicao do produto (caso a nova quantidade seja maior que a antiga)
				} else {
					// Caso a quantidade vendida ultrapasse a quantidade em estoque
					if ($quantidade_produto_antiga - ($quantidade - $quantidade_antiga) < 0) {
						echo "A quantidade da venda não pode superar a quantidade do estoque disponível, refaça novamente a operação.";
						echo '<p><a href="../form_crud/form_update_venda.php/#atu_ven" 
						title="Refazer operação"><button>Botão refazer operação</button></a></p>';
						exit;
					}
					$quantidade_nova = $quantidade_produto_antiga - ($quantidade - $quantidade_antiga);
					$calculo_reposicao = "UPDATE produto SET quantidade = :quantidade_nova WHERE cd_produto = :cd_produto";
				}
    			// $quantidade_produto recebe $conexao que prepara a transacao para atualiza o estoque na tabela produto
    			$quantidade_produto = $conexao->prepare($calculo_reposicao);
    			// Vincula um valor a um parametro da tabela produto
    			$quantidade_produto->bindValue(':cd_produto', $cd_produto);
    			$quantidade_produto->bindValue(':quantidade_nova', $quantidade_nova);
    			// Executa a operacao
    			$quantidade_produto->execute();
    			// Confirma a execucao das query's em todas as transacoes  
				$conexao->commit();
    			// Retorna para a pagina de formulario de listagem
				header('Location: ../form_crud/form_select_venda.php/#nome');
				die();
				// Se a atualizacao nao for possivel de realizar
			} catch (PDOException $falha_atualizacao) {
				$conexao->rollBack();
				echo "A atualização não foi feita".$falha_atualizacao->getMessage();
				die;
			} catch (Exception $falha) {
				$conexao->rollBack();
				echo "Erro não característico do PDO". $falha->getMessage();
				die;
			}
		// Caso nao exista
		} else {
			echo "Ocorreu algum erro ao finalizar a operação, refaça novamente a operação.";
			echo '<p><a href="../form_crud/form_update_venda.php/#atu_ven" 
			title="Refazer operação"><button>Botão refazer operação</button></a></p>';
			exit;
		} 		
	?>
</body>
</html>
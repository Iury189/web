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
	<title> UPDATE | FORNECEDOR </title>
	<link rel="stylesheet" href="/web/css/css.css">
</head>
<body>
	<?php
		// Se existir o botao de Atualizar
		if(isset($_POST['Atualizar'])){	
			// Especifica a variavel
			$cd_fornecedor = intval($_POST['cd_fornecedor']);
			$nome = strval($_POST['nome']);
			$cnpj = strval($_POST['cnpj']);
			$telefone = strval($_POST['telefone']);
			$email = strval($_POST['email']);
			$estado = strval($_POST['estado']);
			$cidade = strval($_POST['cidade']);
			$bairro = strval($_POST['bairro']);
			$endereco = strval($_POST['endereco']);
			$numero = intval($_POST['numero']);
			// Se a atualizacao for possivel de realizar
			try {
				// Query que faz a atualizacao
				$atualizacao = "UPDATE fornecedor SET nome = :nome, cnpj = :cnpj, 
				telefone = :telefone, email = :email, estado = :estado, cidade = :cidade,
				bairro = :bairro, endereco = :endereco, numero = :numero 
				WHERE cd_fornecedor = :cd_fornecedor";
				// $atualiza_dados recebe $conexao que prepare a operacao de atualizacao
				$atualiza_dados = $conexao->prepare($atualizacao);
				// Vincula um valor a um parametro
				$atualiza_dados->bindValue(':cd_fornecedor', $cd_fornecedor);
				$atualiza_dados->bindValue(':nome', $nome);
				$atualiza_dados->bindValue(':cnpj', $cnpj);
				$atualiza_dados->bindValue(':telefone', $telefone);
				$atualiza_dados->bindValue(':email', $email);
				$atualiza_dados->bindValue(':estado', $estado);
				$atualiza_dados->bindValue(':cidade', $cidade);
				$atualiza_dados->bindValue(':bairro', $bairro);
				$atualiza_dados->bindValue(':endereco', $endereco);
			    $atualiza_dados->bindValue(':numero', $numero);
			    // Executa a operacao
			    $atualiza_dados->execute();
			    // Retorna para a pagina de formulario de listagem
				header('Location: ../form_crud/form_select_fornecedor.php/#nome');
				die();	
			// Caso a atualizacao for possivel de realizar
			} catch (PDOException $falha_atualizacao) {
			    echo "A atualização não foi feita".$falha_atualizacao->getMessage();
			    die;
			} catch (Exception $falha) {
				echo "Erro não característico do PDO".$falha->getMessage();
				die;
			}
		// Caso nao exista
		} else {
			echo "Ocorreu algum erro ao finalizar a operação, refaça novamente a operação.";
			echo '<p><a href="../form_crud/form_update_fornecedor/#atu_forn.php" 
			title="Refazer operação"><button>Botão refazer operação</button></a></p>';
			exit;
		} 
	?>
</body>
</html>
<?php
	// Arquivo conexao.php
	require(__DIR__ . '/conexao/conexao.php');
	// Arquivo classe_usuario.php
	require(__DIR__ . '/classe/classe_usuario.php');
	// Inicio da sessao
	session_start();
	// Se existir $_SESSION['id_usuario'] e nao for vazio
	if((isset($_SESSION['id_usuario'])) && (!empty($_SESSION['id_usuario']))){
		// Mensagem
		echo "Usuário: " . $_SESSION['nome_usuario'] . "<br/> ";
		echo "Cargo: " . $_SESSION['cargo_usuario'];
	// Se nao
	} else {
		// Retorna para a pagina index.php
		echo "<script> alert('Ação inválida, entre no sistema da maneira correta.'); location.href='/web/index.php' </script>";
		die;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Início </title>
	<link rel="stylesheet" href="/web/css/css.css">
</head>
<body>

	<nav id="menu">
		<ul>
			<li> <a href="/web/inicio.php"> Início </a> </li>
			<li class="submenu"> <a> Cliente </a>
				<ul>
					<li><a href="/web/form_crud/form_insert_cliente.php" title="Cadastrar cliente"> Cadastrar cliente </a></li>
					<li><a href="/web/form_crud/form_select_cliente.php" title="Listar clientes"> Listar clientes </a></li> 
					<li><a href="/web/form_crud/form_update_cliente.php" title="Atualizar cliente"> Atualizar cliente </a></li>
					<li><a href="/web/form_crud/form_delete_cliente.php" title="Excluir cliente"> Excluir cliente </a></li>
				</ul>
			</li>
			<li class="submenu"> <a> Funcionário </a>
				<ul>
					<li><a href="/web/form_crud/form_insert_funcionario.php" title="Cadastrar funcionário"> Cadastrar funcionário </a></li>
					<li><a href="/web/form_crud/form_select_funcionario.php" title="Listar funcionários"> Listar funcionários </a></li> 
					<li><a href="/web/form_crud/form_update_funcionario.php" title="Atualizar funcionário"> Atualizar funcionário </a></li>
					<li><a href="/web/form_crud/form_delete_funcionario.php" title="Excluir funcionário"> Excluir funcionário </a></li>
				</ul>
			</li>
			<li class="submenu"> <a> Fornecedor </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_fornecedor.php" title="Cadastrar fornecedor"> Cadastrar fornecedor </a></li>
					<li> <a href="/web/form_crud/form_select_fornecedor.php" title="Listar fornecedores"> Listar fornecedores </a></li> 
					<li> <a href="/web/form_crud/form_update_fornecedor.php" title="Atualizar fornecedor"> Atualizar fornecedor </a></li>
					<li> <a href="/web/form_crud/form_delete_fornecedor.php" title="Excluir fornecedor"> Excluir fornecedor </a></li>
				</ul>
			</li>
			<li class="submenu"> <a> Produto </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_produto.php" title="Cadastrar produto"> Cadastrar produto </a> </li>
					<li> <a href="/web/form_crud/form_select_produto.php" title="Listar produtos"> Listar produtos </a> </li> 
					<li> <a href="/web/form_crud/form_update_produto.php" title="Atualizar produto"> Atualizar produto </a> </li>
					<li> <a href="/web/form_crud/form_delete_produto.php" title="Excluir produto"> Excluir produto </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Compra </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_compra.php" title="Cadastrar compra"> Cadastrar compra </a> </li>
					<li> <a href="/web/form_crud/form_select_compra.php" title="Listar compras"> Listar compras </a> </li> 
					<li> <a href="/web/form_crud/form_update_compra.php" title="Atualizar compra"> Atualizar compra </a> </li>
					<li> <a href="/web/form_crud/form_delete_compra.php" title="Excluir compra"> Excluir compra </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Venda </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_venda.php" title="Cadastrar venda"> Cadastrar venda </a> </li>
					<li> <a href="/web/form_crud/form_select_venda.php" title="Listar vendas"> Listar vendas </a> </li> 
					<li> <a href="/web/form_crud/form_update_venda.php" title="Atualizar venda"> Atualizar venda </a> </li>
					<li> <a href="/web/form_crud/form_delete_venda.php" title="Excluir venda"> Excluir venda </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Devolução </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_devolucao.php" title="Cadastrar devolução"> Cadastrar devolução </a> </li>
					<li> <a href="/web/form_crud/form_select_devolucao.php" title="Listar devoluções"> Listar devoluções </a> </li> 
					<li> <a href="/web/form_crud/form_update_devolucao.php" title="Atualizar devolução"> Atualizar devolução </a> </li>
					<li> <a href="/web/form_crud/form_delete_devolucao.php" title="Excluir devolução"> Excluir devolução </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Fluxo de caixa </a>
				<ul>
					<li> <a href="/web/form_crud/caixa_venda.php" title="Fluxo de vendas"> Fluxo de vendas </a> </li>
					<li> <a href="/web/form_crud/caixa_devolucao.php" title="Fluxo de devoluções"> Fluxo de devoluções </a> </li> 
				</ul>
			</li>
			<li class="submenu"> <a> Configurações </a>
				<ul>
					<li> <a href="/web/form_crud/form_update_senha.php" title="Alterar senha"> Alterar senha </a> </li>
					<li> <a href="/web/form_crud/form_area_adm.php" title="Área Administrador"> Área Administrador </a> </li> 
				</ul>
			</li>
			<li> <a href="/web/logout.php" title="Sair do sistema"> Sair </a> </li> 
		</ul>
	</nav>
	
	<?php
		// Se a selecao for possível de realizar
		try {
			// Query que faz a selecao
			$selecao = "SELECT COUNT(cd_cliente) AS qtd_cliente, 
			(SELECT COUNT(cd_funcionario) FROM funcionario WHERE cargo != 'Administrador') AS qtd_funcionario,
			(SELECT COUNT(cd_fornecedor) FROM fornecedor) AS qtd_fornecedor, 
			(SELECT COUNT(cd_compra_fornecedor) FROM compra_fornecedor) AS qtd_compra,
			(SELECT COUNT(cd_produto) FROM produto) AS qtd_produto, 
			(SELECT COUNT(cd_venda) FROM VENDA) AS qtd_venda, 
			(SELECT COUNT(cd_devolucao) FROM devolucao) AS qtd_devolucao FROM cliente";
			// $seleciona_dados recebe $conexao que prepare a operacao para selecionar
			$seleciona_dados = $conexao->prepare($selecao);
			// Executa a operacao
			$seleciona_dados->execute();
			// Retorna uma matriz contendo todas as linhas do conjunto de resultados
			$linhas = $seleciona_dados->fetchAll(PDO::FETCH_ASSOC);
		// Se a selecao nao for possivel de realizar
		} catch (PDOException $falha_selecao) {
			echo "A listagem de dados não foi feita".$falha_selecao->getMessage();
			die;
		} catch (Exception $falha) {
			echo "Erro não característico do PDO".$falha->getMessage();
			die;
		}
	?>
	<table border="1">
		<caption title="Painel"> Painel </caption>
		<tr> 
			<th title="Número de clientes"> N° de clientes </th>
			<th title="Número de funcionários"> N° de funcionários </th>
			<th title="Número de fornecedores"> N° de fornecedores </th>
		    <th title="Número de compras"> N° de compras </th>
		    <th title="Número de produtos"> N° de produtos </th>
		    <th title="Número de vendas"> N° de vendas </th>
		    <th title="Número de devoluções"> N° de devoluções </th>
		</tr>
		<?php
			foreach ($linhas as $exibir_colunas) {
			 	echo '<tr>';
				echo '<td title="'.$exibir_colunas['qtd_cliente'].' cliente(s)">'.$exibir_colunas['qtd_cliente'].'</td>';
				echo '<td title="'.$exibir_colunas['qtd_funcionario'].' funcionário(s)">'.$exibir_colunas['qtd_funcionario'].'</td>';
				echo '<td title="'.$exibir_colunas['qtd_fornecedor'].' fornecedor(s)">'.$exibir_colunas['qtd_fornecedor'].'</td>';
				echo '<td title="'.$exibir_colunas['qtd_compra'].' compra(s)">'.$exibir_colunas['qtd_compra'].'</td>';
				echo '<td title="'.$exibir_colunas['qtd_produto'].' produto(s)">'.$exibir_colunas['qtd_produto'].'</td>';
				echo '<td title="'.$exibir_colunas['qtd_venda'].' venda(s)">'.$exibir_colunas['qtd_venda'].'</td>';
				echo '<td title="'.$exibir_colunas['qtd_devolucao'].' devolução(ões)">'.$exibir_colunas['qtd_devolucao'].'</td>';
				echo '</tr>'; echo '</p>';
			} 
		?>
	</table>
</body>
</html>
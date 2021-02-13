<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"> 
	<title> Excluir venda </title>
	<link rel="stylesheet" href="/WEB/css/css.css">
	<script type="text/javascript" src="/WEB/js/alerta/alerta_delete.js" charset="UTF-8"></script>
</head>
<body> 
	<?php

		// Mostrar todos os erros do php
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);

		// Se a selecao for possivel de realizar
		try {
			// Arquivo conexao.php
			require_once '../conexao/conexao.php';

			// Query que seleciona chave e nome do fornecedor
			$seleciona_nomes = $conexao->query("SELECT cd_venda FROM venda");
			// Resulta em uma matriz
			$resultado_selecao = $seleciona_nomes->fetchAll();	
			
		// Se a selecao nao for possivel de realizar
		} catch (PDOException $falha_selecao) {
			echo "A listagem de dados não foi feita".$falha_selecao->getMessage();
			die;
		} catch (Exception $falha) {
			echo "Erro não característico do PDO".$falha->getMessage();
			die;
		}
	?>
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
					<li><a href="/web/form_crud/form_delete_funcionario.php" title="Excluir funcionário"> Excluir funcionario </a></li>
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
					<li> <a href="/web/crud/caixa_venda.php" title="Fluxo de vendas"> Fluxo de vendas </a> </li>
					<li> <a href="/web/crud/caixa_devolucao.php" title="Fluxo de devoluções"> Fluxo de devoluções </a> </li> 
				</ul>
			</li>
		</ul>
	</nav>

	<nav>
		<li> <a href="/web/form_crud/form_update_senha.php" title="Alterar senha"> Alterar senha </a> </li>
		<li> <a href="logout.php" title="Sair do sistema"> Sair </a> </li> 
	</nav> 
	<form method="POST" autocomplete="off" action="../crud/delete_venda.php" onsubmit="exibirNome()">
		<p> ID venda:
			<select name="cd_venda" required="" id="cd_venda" title="Caixa de seleção para escolher a venda a ser excluída">
				<option value="" title="Opção vazia, escolha abaixo a venda a ser excluída"> Nenhum </option>
				<?php foreach($resultado_selecao as $valor): ?>
    				<option title="<?= $valor['cd_venda'] ?>" value="<?= $valor['cd_venda'] ?>"><?= $valor['cd_venda'] ?></option>
				<?php endforeach ?>
			</select>
		</p>
		<button name="Deletar" id="botao" title="Botão para excluir a venda">Deletar venda</button>
	</form>
	<?php 
		// Se a selecao for possivel de realizar
		try {
			// Query que faz a selecao
			$selecao = "SELECT venda.cd_venda, produto.nome AS nome_produto, 
			funcionario.nome AS nome_funcionario, cliente.nome AS nome_cliente, 
			venda.tipo_pagamento, venda.valor_item, venda.quantidade, produto.quantidade AS estoque,
			venda.valor_venda, venda.data_venda FROM venda
			INNER JOIN produto ON (produto.cd_produto = venda.cd_produto)
			INNER JOIN funcionario ON (funcionario.cd_funcionario = venda.cd_funcionario)
			INNER JOIN cliente ON (cliente.cd_cliente = venda.cd_cliente)";
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
		<tr> 
			<th title="ID"> ID </th>
			<th title="Produto"> Produto </th>
			<th title="Funcionário"> Funcionário </th>
			<th title="Cliente"> Cliente </th>
			<th title="Valor item"> Valor item </th>
			<th title="Quantidade vendida"> Quantidade vendida </th> 
		    <th title="Estoque disponível"> Estoque disponível </th>
		    <th title="Valor da venda"> Valor da venda </th>
		    <th title="Pagamento"> Pagamento </th>
		    <th title="Data da venda"> Data da venda </th>
		    <th title="Ações"> Ações </th>
		</tr>
		<?php 
			// Loop para exibir as linhas
			foreach ($linhas as $exibir_colunas){
				echo '<tr>';
		 		echo '<td title="'.$exibir_colunas['cd_venda'].'">'.$exibir_colunas['cd_venda'].'</td>';
		 		echo '<td title="'.$exibir_colunas['nome_produto'].'">'.$exibir_colunas['nome_produto'].'</td>';
		 		echo '<td title="'.$exibir_colunas['nome_funcionario'].'">'.$exibir_colunas['nome_funcionario'].'</td>';
		 		echo '<td title="'.$exibir_colunas['nome_cliente'].'">'.$exibir_colunas['nome_cliente'].'</td>';
		 		echo '<td title="R$'.$exibir_colunas['valor_item'].'">R$'.$exibir_colunas['valor_item'].'</td>';
		 		echo '<td title="'.$exibir_colunas['quantidade'].' produto(s) vendido(s)">'.$exibir_colunas['quantidade'].'</td>';
		 		echo '<td title="'.$exibir_colunas['estoque'].' produto(s) em estoque">'.$exibir_colunas['estoque'].'</td>';
		 		echo '<td title="R$'.$exibir_colunas['valor_venda'].'">R$'.$exibir_colunas['valor_venda'].'</td>';
		 		echo '<td title="'.$exibir_colunas['tipo_pagamento'].'">'.$exibir_colunas['tipo_pagamento'].'</td>';
		 		echo '<td title="'.date('d/m/Y H:i:s', strtotime($exibir_colunas['data_venda'])).'">'.
		 		date('d/m/Y H:i:s', strtotime($exibir_colunas['data_venda'])).'</td>';
		 		echo '<td>'."<a href='../form_crud/form_insert_venda.php' title='Cadastrar venda'>INSERT</a> ".
		 		"<a href='../form_crud/form_select_venda.php' title='Listar vendas'>SELECT</a> ".
		 		"<a href='../form_crud/form_update_venda.php' title='Atualizar venda'>UPDATE</a> ".
		 		"<a href='../form_crud/form_delete_venda.php' title='Deletar venda'>DELETE</a>".'</td>';
		 		echo '</tr>'; echo '</p>';
			}
		?>
	</table>
	<p><a href='../planilha/planilha_venda.php' title="Botão de download do relatório de vendas" target="_blank"><button>Donwload do relatório de vendas</button></a></p>
</body> 
</html> 
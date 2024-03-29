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
		echo "Usuário: " . $_SESSION['nome_usuario'] . "<br/> ";
		echo "Cargo: " . $_SESSION['cargo_usuario'];
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
<html lang="pt-br">
<head>
    <meta charset="utf-8"> 
	<title> Atualizar venda </title>
	<link rel="stylesheet" href="/web/css/css.css">
	<script type="text/javascript" src="/web/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="/web/js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="/web/js/venda/mascara_venda.js"></script>
	<script type="text/javascript" src="/web/js/venda/requisicao_venda.js"></script>
	<script type="text/javascript" src="/web/js/alerta/alerta_update.js" charset="UTF-8"></script>
</head>
<body>
	<nav id="menu">
		<ul>
			<li> <a href="/web/inicio.php" title="Início"> Início </a> </li>
			<li class="submenu"> <a> Cliente </a>
				<ul>
					<li><a href="/web/form_crud/form_insert_cliente.php/#cad_cli" title="Cadastrar cliente"> Cadastrar cliente </a></li>
					<li><a href="/web/form_crud/form_select_cliente.php/#nome" title="Listar clientes"> Listar clientes </a></li> 
					<li><a href="/web/form_crud/form_update_cliente.php/#atu_cli" title="Atualizar cliente"> Atualizar cliente </a></li>
					<li><a href="/web/form_crud/form_delete_cliente.php/#exc_cli" title="Excluir cliente"> Excluir cliente </a></li>
				</ul>
			</li>
			<li class="submenu"> <a> Funcionário </a>
				<ul>
					<li><a href="/web/form_crud/form_insert_funcionario.php/#cad_func" title="Cadastrar funcionário"> Cadastrar funcionário </a></li>
					<li><a href="/web/form_crud/form_select_funcionario.php/#nome" title="Listar funcionários"> Listar funcionários </a></li> 
					<li><a href="/web/form_crud/form_update_funcionario.php/#atu_func" title="Atualizar funcionário"> Atualizar funcionário </a></li>
					<li><a href="/web/form_crud/form_delete_funcionario.php/#exc_func" title="Excluir funcionário"> Excluir funcionário </a></li>
				</ul>
			</li>
			<li class="submenu"> <a> Fornecedor </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_fornecedor.php/#cad_forn" title="Cadastrar fornecedor"> Cadastrar fornecedor </a></li>
					<li> <a href="/web/form_crud/form_select_fornecedor.php/#nome" title="Listar fornecedores"> Listar fornecedores </a></li> 
					<li> <a href="/web/form_crud/form_update_fornecedor.php/#atu_forn" title="Atualizar fornecedor"> Atualizar fornecedor </a></li>
					<li> <a href="/web/form_crud/form_delete_fornecedor.php/#exc_forn" title="Excluir fornecedor"> Excluir fornecedor </a></li>
				</ul>
			</li>
			<li class="submenu"> <a> Produto </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_produto.php/#cad_pro" title="Cadastrar produto"> Cadastrar produto </a> </li>
					<li> <a href="/web/form_crud/form_select_produto.php/#nome" title="Listar produtos"> Listar produtos </a> </li> 
					<li> <a href="/web/form_crud/form_update_produto.php/#atu_pro" title="Atualizar produto"> Atualizar produto </a> </li>
					<li> <a href="/web/form_crud/form_delete_produto.php/#exc_pro" title="Excluir produto"> Excluir produto </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Compra </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_compra.php/#cad_com" title="Cadastrar compra"> Cadastrar compra </a> </li>
					<li> <a href="/web/form_crud/form_select_compra.php/#nome" title="Listar compras"> Listar compras </a> </li> 
					<li> <a href="/web/form_crud/form_delete_compra.php/#exc_com" title="Excluir compra"> Excluir compra </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Venda </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_venda.php/#cad_ven" title="Cadastrar venda"> Cadastrar venda </a> </li>
					<li> <a href="/web/form_crud/form_select_venda.php/#nome" title="Listar vendas"> Listar vendas </a> </li> 
					<li> <a href="/web/form_crud/form_update_venda.php/#atu_ven" title="Atualizar venda"> Atualizar venda </a> </li>
					<li> <a href="/web/form_crud/form_delete_venda.php/#exc_ven" title="Excluir venda"> Excluir venda </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Devolução </a>
				<ul>
					<li> <a href="/web/form_crud/form_insert_devolucao.php/#cad_dev" title="Cadastrar devolução"> Cadastrar devolução </a> </li>
					<li> <a href="/web/form_crud/form_select_devolucao.php/#nome" title="Listar devoluções"> Listar devoluções </a> </li> 
					<li> <a href="/web/form_crud/form_delete_devolucao.php/#exc_dev" title="Excluir devolução"> Excluir devolução </a> </li>
				</ul>
			</li>
			<li class="submenu"> <a> Fluxo de caixa </a>
				<ul>
					<li> <a href="/web/form_crud/caixa_venda.php/#fluxo_ven" title="Fluxo de vendas"> Fluxo de vendas </a> </li>
					<li> <a href="/web/form_crud/caixa_devolucao.php/#fluxo_dev" title="Fluxo de devoluções"> Fluxo de devoluções </a> </li> 
				</ul>
			</li>
			<li class="submenu"> <a> Configurações </a>
				<ul>
					<li> <a href="/web/form_crud/form_update_senha.php/#alt_senha" title="Alterar senha"> Alterar senha </a> </li>
					<li> <a href="/web/form_crud/form_area_adm.php/#area_adm" title="Área administrador"> Área administrador </a> </li> 
				</ul>
			</li>
			<li> <a href="/web/logout.php" title="Sair do sistema"> Sair </a> </li> 
		</ul>
	</nav>
	<?php

		// Mostrar todos os erros do php
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);

		// Se a selecao for possivel de realizar
		try {
			// Query que seleciona chave de venda
			$seleciona_vendas = $conexao->query("SELECT cd_venda FROM venda ORDER BY cd_venda");
			// Resulta em uma matriz
			$resultado_vendas = $seleciona_vendas->fetchAll();

			// Query que seleciona chave e nome do produto
			$seleciona_produto = $conexao->query("SELECT cd_produto, nome FROM produto ORDER BY cd_produto");
			// Resulta em uma matriz
			$resultado_produto = $seleciona_produto->fetchAll();

			// Query que seleciona chave e nome do cliente
			$seleciona_cliente = $conexao->query("SELECT cd_cliente, nome FROM cliente ORDER BY cd_cliente");
			// Resulta em uma matriz
			$resultado_cliente = $seleciona_cliente->fetchAll(); 
			
		// Se a selecao nao for possivel de realizar
		} catch (PDOException $falha_selecao) {
			echo "A listagem de dados não foi feita".$falha_selecao->getMessage();
			die;
		} catch (Exception $falha) {
			echo "Erro não característico do PDO".$falha->getMessage();
			die;
		}
	?>
	<form method="POST" id="atu_ven" autocomplete="off" action="/web/crud/update_venda.php" onsubmit="exibirNome()">
		<fieldset>
		<legend> Atualizar venda (Atalho = Alt + w) </legend>
		<p> ID venda:
		<select onclick="buscaDados()" name="cd_venda" id="cd_venda" required="" title="Caixa de seleção para escolher a venda a ser atualizada" accesskey="w">
			<option value="" title="Opção vazia, escolha abaixo o cliente a ser atualizado"> Nenhum </option>
			<?php foreach($resultado_vendas as $valor): ?>
    			<option title="<?= $valor['cd_venda'] ?>" value="<?= $valor['cd_venda'] ?>"><?= $valor['cd_venda'] ?></option>
			<?php endforeach ?>
		</select>
		</p>
		<p> ID produto:
			<select name="cd_produto" id="cd_produto" required="" title="Caixa de seleção para escolher atualizar o produto" readonly="readonly" tabindex="-1" aria-disabled="true">
				<option value="" title="Por padrão a opção é vazia, escolha abaixo o produto desejado"> Nenhum </option>
	  			<?php foreach($resultado_produto as $v1): ?>
    				<option title="<?= $v1['nome'] ?>" value="<?= $v1['cd_produto'] ?>"><?= $v1['nome'] ?></option>
				<?php endforeach ?>
			</select>
		</p>
		<p> ID funcionário:
			<select name="cd_funcionario" id="cd_funcionario" required="" title="Caixa de seleção para escolher o funcionário a ser atualizado">
	  			<option title="<?= $_SESSION['nome_usuario'] ?>" 
				value="<?= $_SESSION['id_usuario'] ?>"><?= $_SESSION['nome_usuario'] ?></option>
			</select>
		</p>
		<p> ID cliente:
			<select name="cd_cliente" id="cd_cliente" required="" title="Caixa de seleção para escolher o cliente a ser atualizado">
				<option value="" title="Por padrão a opção é vazia, escolha abaixo o cliente"> Nenhum </option>
	  			<?php foreach($resultado_cliente as $v3): ?>
    				<option title="<?= $v3['nome'] ?>" value="<?= $v3['cd_cliente'] ?>"><?= $v3['nome'] ?></option>
				<?php endforeach ?>
			</select>
		</p>
		<p> Valor do item: <input type="number" step="any" name="valor_item" placeholder="R$0.00" id="valor_item" title="Campo para atualizar o valor do produto" required="" readonly="readonly"> </p>
		<p> Quantidade: <input type="number" name="quantidade" id="quantidade" pattern="\d+" title="Campo para atualizar a quantidade de produtos para venda" required=""> </p>
		<button name="Atualizar" title="Botão para atualizar a venda"> Botão atualizar venda </button>
		</fieldset>
	</form>
	<button href="#" onclick='window.scrollTo({top: 0, behavior: "smooth"})' title="Botão voltar ao topo">Botão topo da página</button>
	<footer id="rodape">
	<p> Sistema web desenvolvido na matéria de <b>Laboratório e Programação Web</b>. </p>
	<p> Desenvolvido por <a href="https://github.com/Iury189" target="_blank" title="Perfil do GitHub de Iury Fernandes"> 
	<b> Iury Fernandes </b> </a> e <a href="https://github.com/renanoliveir13" target="_blank" title="Perfil do GitHub de Renan Oliveira"> <b>Renan Oliveira<b></a>. </p>
	</footer>
</body>
</html> 
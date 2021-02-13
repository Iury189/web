<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title> Atualizar senha </title>
    <link rel="stylesheet" href="/WEB/css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="/WEB/js/alterar_senha/alterar_senha.js"></script>
    <script type="text/javascript" src="/WEB/js/alerta/alerta_senha.js" charset="UTF-8"></script>
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

			// Query que seleciona chave e nome do funcionario
			$seleciona_nomes = $conexao->query("SELECT cd_funcionario, nome FROM funcionario WHERE cargo != 'Administrador' ");
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
    <form method="POST" autocomplete="off" action="../crud/update_senha.php" onsubmit="exibirNome()">
        <p> ID funcionário:
            <select id="cd_funcionario" name="cd_funcionario" required="" title="Caixa de seleção para escolher o funcionário a ter sua senha atualizada">
                <option value="" title="Opção vazia, escolha abaixo o funcionário"> Nenhum </option>
                <?php foreach($resultado_selecao as $v1): ?>
                    <option title="<?= $v1['nome'] ?>" value="<?= $v1['cd_funcionario'] ?>"><?= $v1['nome'] ?></option>
                <?php endforeach ?>
            </select>
        </p>
        <p> Senha atual:
            <input type="password" name="senha" id="senha"
            title="Campo para inserir a antiga senha de login" size="30" maxlength="32" required=""
            onclick="mostrarSenha()">
            <i class="fa fa-eye" id="text" aria-hidden="true" title="Ocultar senha atual"></i>
            <i class="fa fa-eye-slash" id="pass" aria-hidden="true" title="Exibir senha atual"></i>
        </p>
        <p> Nova senha:
            <input type="password" name="senha_nova" id="senha_nova"
            title="Campo para inserir a nova senha de login" size="30" maxlength="32" required=""
            onclick="mostrarNovaSenha()">
            <i class="fa fa-eye" id="text1" aria-hidden="true" title="Ocultar a nova senha"></i>
            <i class="fa fa-eye-slash" id="pass1" aria-hidden="true" title="Exibir a nova senha"></i>
        </p>
        <p> Redigite a nova senha:
            <input type="password" name="confirmar_senha_nova" id="confirmar_senha_nova"
            title="Campo para inserir novamente a nova senha de login" size="30" maxlength="32"
            required="" onclick="mostrarConfirmarSenha()">
            <i class="fa fa-eye" id="text2" aria-hidden="true" title="Ocultar a nova senha"></i>
            <i class="fa fa-eye-slash" id="pass2" aria-hidden="true" title="Exibir a nova senha"></i>
        </p>
        <button name="Atualizar" id="botao" title="Botão para atualizar a senha">Atualizar senha</button>
    </form>
</body>
</html>
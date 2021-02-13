<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title> Login </title>
	<link rel="stylesheet" href="/WEB/css/css.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="/WEB/js/senha_login/senha_login.js"></script>
</head>
<body>
	<h1 title="Login"> Login </h1>
	<form method="POST" autocomplete="off" action="valida_login.php">
		<p> Email: <input type="email" name="email" title="Campo para digitar seu email" size=30 required maxlength="50"> </p>
		<p> Senha:
			<input type="password" id="senha" name="senha" title="Campo para digitar sua senha" size="30" 
			maxlength="32" required="" onclick="mostrarSenha()">
			<i class="fa fa-eye" id="text" aria-hidden="true" title="Ocultar senha"></i>
			<i class="fa fa-eye-slash" id="pass" aria-hidden="true" title="Exibir senha"></i>
		</p>
		<button name="Entrar" title="Botão para entrar no sistema">Entrar</button>
	</form>
</body>
</html>
<?php require_once 'header.php'; ?>

<h1>Seja bem-vindo à Livraria Bruno!</h1>
<p>Para sua comodidade, efetue o login:</p>

<div class="formulario">

	<form action="login.php" method="POST" accept-charset="utf-8">
		<div class="campos-login">
			<label>Usuário:</label>
			<input type="text" name='username'>
			<br>
			<label id='senha'>Senha:</label>
			<input type='password' name='password'>
			<br>
		</div>
		
		<div id="admin">
			<input type='checkbox' name='chkAdmin'>
			<label>Efetuar <i>login</i> como Administrador</label>
		</div>

		<input id='btn-login' type='submit' name='btn-login' value='Login'>
		
		<a href='cadastro.php' title='Novo Usuário'>Cadastro de Novo Usuário</a>
		
	</form>

</div>

<?php require_once 'footer.php'; ?>
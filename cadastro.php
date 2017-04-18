<?php require_once 'header.php'; ?>

	<div class="campos-cadastro">
		<form action="valida-cadastro.php" method="POST" accept-charset="utf-8">
			<table>
				<th>
					<tr>
						<td colspan="2"><h1>Cadastro de Novo Cliente</h1></td>
					</tr>
				</th>
				<tr>
					<td class="estatico">Nome Completo:</td>
					<td><input type='text' name='nome' style="width: 300px;"></td>
				</tr>
				<tr>
					<td class="estatico">E-mail para contato:</td>
					<td><input type='email' name='email' style="width: 300px;"></td>
				</tr>
				<tr>
					<td class="estatico">Usuário (máximo de 15 caracteres):</td>
					<td><input type='text' name='user' style="width: 80px;"></td>
				</tr>
				<tr>
					<td class="estatico">Senha (máximo de 15 caracteres):</td>
					<td><input type='password' name='password' style="width: 80px;"></td>
				</tr>
				<tr>
					<td class="estatico">Repita sua senha:</td>
					<td><input type='password' name='conf-password' style="width: 80px;"></td>
				</tr>
				<tr>
					<td class="estatico">Endereço Completo:</td>
					<td><input type='text' name='endereco' style="width: 300px;"></td>
				</tr>
				<tr>
					<td class="estatico">Cidade/Estado:</td>
					<td><input type='text' name='cidade' style="width: 300px;"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input id='btn-cadastro' type='submit' name='btn-cadastro' value='Cadastrar' style='width: 150px;'>
					</td>
				</tr>
			</table>
		</form>

	</div>





<?php require_once 'footer.php'; ?>
<?php require_once 'inc/conecta_mysql.inc.php';?>

<?php 

	//variáveis vindas do form index.php
	$frmNome = $_POST['nome'];
	$frmEmail = $_POST['email'];
	$frmUser = $_POST['user'];
	$frmSenha = $_POST["password"];
	$frmConfSenha = $_POST['conf-password'];
	$frmEndereco = $_POST['endereco'];
	$frmCidade = $_POST['cidade'];
	
	/*valida se os campo senha e confirma senha estão informados corretamente. Caso esteja certo, irá 
	 *executar o select e verificar se o nome de usuário ja foi usado. Caso seja novo nome de usuario
	 *irá prosseguir com o insert. Do contrário, irá informar que usuário já existe.
	*/
	if ($frmSenha === $frmConfSenha) {
	//linha acima, confere "senha" e "confirma senha". Linha abaixo, query para verificar se já existe usuário
		$queryUser = "select usuario, senha from clientes where usuario = '".$frmUser."'";
	//linha abaixo, se usuario ja foi utilizado, exibe mensagem pedindo para utilizar outro username	
		if($result = $mysqli->query($queryUser)){
			if($row = $result->fetch_assoc()){
				echo 'Usuário informado já existe. Informe outro';
			}
			else {
	//caso contrario (else), ele prossegue com o insert			
				$sql = "INSERT INTO clientes (usuario, senha, nome, email, endereco, cidade)
						VALUES ( '".$frmUser."', '".$frmSenha."', '".$frmNome."', '".$frmEmail."', '".$frmEndereco."','".$frmCidade."' )";
	//linha acima, query para INSERT no banco de dados. linha de baixo, Execução e validação do cadastro			
				$result = $mysqli->query($sql);
				if ($mysqli->affected_rows){
					echo 'Usuário '.$frmUser.' Cadastrado com Sucesso! <br> Você será redirecionado para a tela de login';
					header( "refresh:5;url=login.php" ); 
				}
	//Caso de todo, ocorra algum erro, ele exibirá mensagem dizendo que não foi possível cadastrar o usuário. Aí, Só Jesus...			
				else{
					echo 'não foi possível cadastrar o usuário. Tente novamente.';
				}
			}			
		}
	}
	//mensagem exibida caso o campo senha e confere senha estejam diferentes. Redireciona para o login
	else{
		echo '<h1>Os campos <u>Senha</u> e <u>Repita sua senha</u> não correspondem. Repita o cadastro.</h1>'.
			 '<h2 Aguarde. Você será direcionado para Formulário de Cadastro</h2>';
		header( "refresh:5;url=cadastro.php" ); 	 

	}

?>
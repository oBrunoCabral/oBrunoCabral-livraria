<?php
	//Script de conexão com o banco de dados
	require_once 'inc/conecta_mysfql.inc.php';
?>
<?php 
	//variáveis vindas do form cadastro.php alocadas no array $infosUsuario
	$infosUsuario = [$_POST['nome'],$_POST['email'], $_POST['user'],$_POST["password"],$_POST['conf-password'],$_POST['endereco'],$_POST['cidade'],];
	
	/*valida se os campo senha e confirma senha estão informados corretamente. Caso esteja certo, irá 
	 *executar o select e verificar se o nome de usuário ja foi usado. Caso seja novo nome de usuario
	 *irá prosseguir com o insert. Do contrário, irá informar que usuário já existe.
	*/
	if ($infosUsuario[3] === $infosUsuario[4]){
	//linha acima, confere "senha" e "confirma senha". Linha abaixo, query para verificar se já existe usuário
		$queryUser = "select usuario, senha from clientes where usuario = '".$infosUsuario[2]."'";
	//linha abaixo, se usuario ja foi utilizado, exibe mensagem pedindo para utilizar outro username	
		if($result = $mysqli->query($queryUser)){
			if($row = $result->fetch_assoc()){
				echo 'Usuário informado já existe. Informe outro';
			}
			else {
	//caso contrario (else), ele prossegue com o insert			
				$sql = "INSERT INTO clientes (usuario, senha, nome, email, endereco, cidade)
						VALUES ( '".$infosUsuario[2]."',
								 '".$infosUsuario[3]."',
								 '".$infosUsuario[0]."',
								 '".$infosUsuario[1]."',
								 '".$infosUsuario[5]."',
								 '".$infosUsuario[6]."' )";
	//linha acima, query para INSERT no banco de dados. linha de baixo, Execução e validação do cadastro			
				$result = $mysqli->query($sql);
				if ($mysqli->affected_rows){
					echo 'Usuário '.$infosUsuario[2].' Cadastrado com Sucesso! <br> Você será redirecionado para a tela de login';
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
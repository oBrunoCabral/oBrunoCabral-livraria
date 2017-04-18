<?php require_once 'inc/conecta_mysql.inc.php';?>

<?php 
	session_start();
	$_SESSION['usuario'] = $_POST['username'];
	$_SESSION['senha'] = $_POST['password'];
	$_SESSION['user admin'] = $_POST['chkAdmin'];
?>

<?php
	//variáveis vindas do form index.php
	$dbUsername = $_POST['username'];
	$dbPassword = $_POST['password'];
	$chkAdmin = $_POST['chkAdmin'];

	//query para consulta de usuários/admins
	$queryAdm = "SELECT usuario, senha from admins where usuario = '".$dbUsername."' and senha = '".$dbPassword."'";	
	$queryUser = "select usuario, senha from clientes where usuario = '".$dbUsername."' and senha = '".$dbPassword."'";

	//se o usuário for admin:
	if($chkAdmin){
		if($result = $mysqli->query($queryAdm)){
			if($row = $result->fetch_assoc()){
				if($dbUsername == $row["usuario"] || $dbPassword == $row["senha"]) {
					header('Location: ../admin.php');
				}
			}
			else{
				echo '<h1>Informações Inválidas. Tente Novamente!<h1>';
			}
		}
	}
	//se o usuário não for admin:
	else {
		if($result = $mysqli->query($queryUser)){
			if($row = $result->fetch_assoc()){
				if($dbUsername == $row["usuario"] || $dbPassword == $row["senha"]) {
					header('Location: teste.php');
				}
			}
			else{
				echo '<h1>Informações Inválidas. Tente Novamente!<h1>';
				header( "refresh:1;url=index.php" ); 
			}
		}		
	}	
?>
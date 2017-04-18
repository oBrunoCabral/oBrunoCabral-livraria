<?php require_once 'conecta_mysql.inc.php';?>

<?php 
	session_start();
	$_SESSION['usuario'] = $_POST['username'];
	$_SESSION['senha'] = $_POST['password'];
	$_SESSION['user admin'] = $_POST['chkAdmin'];
?>

<?php	
	$dbUsername = $_POST['username'];
	$dbPassword = $_POST['password'];
	$chkAdmin = $_POST['chkAdmin'];

	$queryAdm = "select usuario, senha from admins where usuario = '".$dbUsername."' and senha = '".$dbPassword."'";	
	$queryUser = "select usuario, senha from clientes where usuario = '".$dbUsername."' and senha = '".$dbPassword."'";

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
	else {
		if($result = $mysqli->query($queryUser)){
			if($row = $result->fetch_assoc()){
				if($dbUsername == $row["usuario"] || $dbPassword == $row["senha"]) {
					header('Location: ../teste.php');
				}
			}
			else{
				echo '<h1>Informações Inválidas. Tente Novamente!<h1>';
			}
		}		
	}	
?>
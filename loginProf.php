<?php
  session_start();
  require_once('conecta_mysql.inc.php');
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $isAdmin = isset($_POST['admin']);

  //echo 'Usuário antes de escape: ' . $usuario . '<br>' .
  //     'Senha antes de escape: ' . $senha . '<br><br>';
       
  $usuario = $mysqli->real_escape_string($usuario);
  $senha   = $mysqli->real_escape_string($senha);
  
  //echo 'Usuário depois de escape: ' . $usuario . '<br>' .
  //     'Senha depois de escape: ' . $senha . '<br>';
  
  $tabela =
    ($isAdmin)
    ? 'admins'
    : 'clientes';
  
  //$sql = 
  //'SELECT usuario, senha from ' . $tabela . ' WHERE //usuario = ? and senha = ?';
  
  $sql = 
   'SELECT 1 from ' . $tabela . ' WHERE usuario = ? and  senha = ?';  
  
  $statement = $mysqli->prepare($sql);
  $statement->bind_param("ss", $usuario, $senha);
  $statement->execute(); 
  $statement->bind_result($resultado);
  //$statement->bind_result($usuario_retorno, $senha_retorno);
  $statement->fetch(); 

  //printf("%s / %s\n", $usuario_retorno, $senha_retorno);
  
  $loginValido = ($resultado == 1);
  $sessao = '';
  
  if($loginValido) {
    
    $sessao = 
      ($isAdmin)
      ? 'admin'
      : 'loja';
      
    $_SESSION[$sessao] = 1;
  }
  else {
    
    unset($_SESSION[$sessao]);
  }
  
  if ($isAdmin) {
    
    echo $sql;
    echo "<br><a href='admin.php'>admin</a>";
    //header('location:admin.php');
  }
  else {
    
    echo $sql;
    echo "<br><a href='loja.php'>loja</a>";
    //header('location:loja.php');
  }

?>
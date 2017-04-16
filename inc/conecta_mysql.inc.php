<?php
  $servidor    = 'localhost';
  $banco       = 'loja';
  $usuario_bd  = 'root';
  $senha_bd    = '';
  $mysqli      = new mysqli($servidor, $usuario_bd, $senha_bd, $banco); 
  
  //Definindo a codificação UTF-8 como padrão
  $mysqli->set_charset('utf8');  
?>
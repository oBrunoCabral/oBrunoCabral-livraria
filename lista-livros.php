<?php require_once 'inc/header.php'; ?>

<?php
	$query = "select titulo, autor, preco, imagem, qtde from livros";
	
	if($result = $mysqli->query($query)){

		while($row = $result->fetch_assoc()){

			echo
			'<div class=\'livros\'>'.
				'<img class=\'capa\' src=' . $row["imagem"] . '><br>'.
				'<span class=\'info-livro\'>Título: </span>'.$row["titulo"].'<br>'. 
				'<span class=\'info-livro\'>Autor: </span>'.$row["autor"].'<br>'.
				'<span class=\'info-livro\'>Preço: </span>'.'R$'.$row["preco"].'<br>'.
				'<span class=\'info-livro\'>Quantidade: </span>'.$row["qtde"].'<br>'.
			'</div>'.
			'<hr>'
			;
		}
	}
?>

<?php require_once 'inc/footer.php'; ?>
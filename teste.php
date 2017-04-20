<?php require_once 'header.php'; ?>

<?php
	$query = "select titulo, autor, preco, imagem, qtde from livros";
?>

<?php
	if($result = $mysqli->query($query)){

		while($row = $result->fetch_assoc()){
?>
			<div class='livros'>
				<img class='capa' src='<?php echo $row["imagem"] ?>'><br>
				<span class='info-livro'>Título: </span><?php echo $row["titulo"] ?><br>
				<span class='info-livro'>Autor: </span><?php echo $row["autor"] ?><br>
				<span class='info-livro'>Preço: </span>R$<?php echo $row["preco"] ?><br>
				<span class='info-livro'>Quantidade: </span><?php echo $row["qtde"] ?><br>'
			</div>
			<hr>
<?php
		}
	}
?>



<!-- DOIDERA DEMAIS ESSE AQUI EMBAIXO! COMENTA O DE CIMA E 'DESCOMENTA' ESSE DE BAIXO.
<?php
	if($result = $mysqli->query($query)){

		while($row = $result->fetch_assoc()){
?>
	<div style="display: inline-block; width: 600px;" class="container">
		<table>
			<tr>
				<td rowspan='4'> <img src="<?php echo $row["imagem"] ?>"></td>
				<td>Título: <?php echo $row["titulo"] ?></td>
			</tr>
			<tr>
				<td>Autor: <?php echo $row["autor"] ?></td>
			</tr>
			<tr>
				<td>Preço: <?php echo $row["preco"] ?></td>
			</tr>
			<tr>
				<td>Quantidade: <?php echo $row["qtde"] ?></td>
			</tr>			
		</table>

	</div>
<?php
	 	}
	}
?>
 -->




<?php require_once 'footer.php'; ?>
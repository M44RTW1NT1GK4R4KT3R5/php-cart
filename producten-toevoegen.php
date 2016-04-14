<?php include 'header.php';?>
<?php include 'database.php';?>

<?php
	if (isset($_POST['submit'])){
		try{
			$stmt = $conn->prepare("INSERT INTO cart_producten(naam,prijs) VALUES (?,?)");
			$stmt->bindParam(1,$_POST['name']);
			$stmt->bindParam(2,$_POST['price']);
			$stmt->execute();
			echo <<<HH
			<div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> Het boek is toegevoegd.
			</div>



HH;
		}catch (PDOexception $ex) {
			if ( $dbcon['debug'] ){
				$error = $ex->getMessage();
				echo $error;
			}
		}
	}
?>





<form action="producten-toevoegen.php" method="POST">
	<table>
		<tr>
			<td>Boeknaam: </td>
			<td><input type="text" name="name" required></td>
		</tr>
		<tr>
			<td>Prijs: </td>
			<td><input type="number" name="price" required></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Voeg toe" name="submit"></td>
		</tr>
	</table>
</form>








<?php include 'footer.php';?>
<?php include 'header.php';?>
<?php include 'database.php';?>

<?php
	if (isset($_POST['submit'])){
		try{
			$stmt = $conn->prepare("INSERT INTO cart_leveranciers(bedrijfsnaam,adres,postcode,plaats,telefoonnummer,email) VALUES (?,?,?,?,?,?)");
			$stmt->bindParam(1,$_POST['name']);
			$stmt->bindParam(2,$_POST['address']);
			$stmt->bindParam(3,$_POST['postcode']);
			$stmt->bindParam(4,$_POST['city']);
			$stmt->bindParam(5,$_POST['phone']);
			$stmt->bindParam(6,$_POST['email']);
			$stmt->execute();
			echo <<<HH
			<div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> leverancier toegevoegd.
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



<form action="leverancier-toevoegen.php" method="POST">
	<table>
		<tr>
			<td>Bedrijfsnaam: </td>
			<td><input type="text" name="name" required></td>
		</tr>
		<tr>
			<td>Adres: </td>
			<td><input type="text" name="address" required></td>
		</tr>
		<tr>
			<td>Postcode: </td>
			<td><input type="text" name="postcode" required></td>
		</tr>
		<tr>
			<td>Plaats: </td>
			<td><input type="text" name="city" required></td>
		</tr>
		<tr>
			<td>Telefoonnummer: </td>
			<td><input type="text" name="phone" required></td>
		</tr>
		<tr>
			<td>E-Mail: </td>
			<td><input type="email" name="email" required></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Voeg toe" name="submit"></td>
		</tr>
	</table>
</form>



<?php include 'footer.php';?>
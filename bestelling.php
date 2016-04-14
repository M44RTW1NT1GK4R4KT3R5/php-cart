<?php session_start(); ?>
<?php include 'header.php';?>
<?php include 'database.php';?>

<?php
	try{
		$stmt = $conn->prepare("INSERT INTO cart_klant (naam,email) VALUES (?,?)");
		$stmt->bindParam(1,$name);
		$stmt->bindParam(2,$email);
		$name = $_POST['name'];
		$email = $_POST['email'];
		$stmt->execute();
		$lastId = $conn->lastInsertId();
	}catch (PDOexception $ex){
		if ($dbcon['debug']){
			$error = $ex->getMessage();
			echo $error;
		}
	}

	$total_order = 0;
	if (isset($_SESSION['cart_content'])){
		$cart_array = explode(',', $_SESSION['cart_content']);
		foreach ($cart_array as $item) {
			$query = "SELECT * FROM cart_producten WHERE id='".$item."'";
			$query_result = $conn->query($query);
			$product = $query_result->fetch(PDO::FETCH_ASSOC);
			$total_order += $product['prijs'];	
		}
	}

	try {
		$stmt = $conn->prepare("INSERT INTO cart_bestellingen(totaal_prijs,klant_id) VALUES (?,?)");
		$stmt->bindParam(1,$totaal_prijs);
		$stmt->bindParam(2,$klant_id);
		$totaal_prijs = $total_order;
		$klant_id = $lastId;
		$stmt->execute();
		$lastOrderId = $conn->lastInsertId();
	} catch (PDOexception $ex) {
		if ($dbcon['debug']){
			$error = $ex->getMessage();
			echo $error;
		}
	}

if ( isset( $_SESSION['cart_content'] ) ){
	$cart_array = explode( ',', $_SESSION['cart_content'] );
	foreach ($cart_array as $item) {
	 	$query = "SELECT * FROM cart_producten WHERE id = '". $item ."'";
	 	$query_result = $conn->query( $query );
	 	$product = $query_result->fetch(PDO::FETCH_ASSOC);
	 	try{
	 	$stmt = $conn->prepare("INSERT INTO cart_bestelling_line (product_id, bestelling_id, aantal) VALUES (?,?,?)");
	 	$stmt->bindParam(1, $product_id);
	 	$stmt->bindParam(2, $bestelling_id);
	 	$stmt->bindParam(3, $aantal);
	 	$product_id = $item;
	 	$bestelling_id = $lastOrderId;
	 	$aantal = 1;
	 	$stmt->execute();
	} catch (PDOexception $ex) {
		if ( $dbcon['debug'] ){
			$error = $ex->getMessage();
			echo $error;
		}
	}
		}
	}  
?>

<div clas="container">
	<div class="row">
			<p>Bedankt voor het bestellen <?=$_POST['name'];?></p>
			<p>Het bestellingsnummer is <strong><?= $lastOrderId;?></strong></p>
	</div>
</div>







<?php include 'footer.php';?>
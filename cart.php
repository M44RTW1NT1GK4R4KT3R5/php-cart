<?php include 'header.php';?>
<?php include 'database.php';?>
	<!--here  H ow  T o  M eet  L adies-->
<?php
	session_start();

	if (isset ( $_GET['remove'])){
		echo 'Triggered';
		$_SESSION['cart_content'] = preg_replace('/'.$_GET['pid'].'/', '', $_SESSION['cart_content'],1);
		$_SESSION['cart_content'] = preg_replace('/,,/', ',', $_SESSION['cart_content'],1);
		$_SESSION['cart_content'] = trim($_SESSION['cart_content'],",");
		header("location:cart.php");
	}	

	if (isset($_GET['pid']) && !isset($_GET['remove'])){
		if (!isset($_SESSION['cart_content'])){
			$_SESSION['cart_content'] = $_GET['pid'];
		}else{
			$_SESSION['cart_content'] .=',';
	    	$_SESSION['cart_content'] .=$_GET['pid'];
		}

	}

	if (isset ($_GET['empty'])){
	  session_destroy();
	  header('location:cart.php');
	}
	if ($dbcon['debug']){
	  echo "<pre>";
	  print_r ($_SESSION);
	  echo "</pre>";
	}

	if (isset($_SESSION['cart_content'])){
		if (strlen($_SESSION['cart_content']) < 1){
			unset($_SESSION['cart_content']);
		}
	}
?>

<div class="container">
	<div class="row">
		<h2>Producten in winkelwagen</h2>
		<?php
			if (isset($_SESSION['cart_content'])){
				$cart_array = explode(",", $_SESSION['cart_content']);
				if ($dbcon['debug']){
				  echo "<pre>";
				  print_r ($_SESSION);
				  echo "</pre>";
				}
				foreach ($cart_array as $item) {
					$query = "SELECT * FROM cart_producten WHERE id='" .$item. "'";
					$query_result = $conn->query($query);
					$product = $query_result->fetch(PDO::FETCH_ASSOC);
					?>
					<div class="col-md-12 col-xs-12 productlistening">
						<p class="col-md-4"><?= $product['naam'];?></p> 
						<p class="col-md-4"><?= $product['prijs'];?></p> 
						<a href="./cart.php?remove=true&pid=<?= $product['id'];?>">Verwijder</a>
					</div>
					<?php
				}
			}
			?>
	</div>
</div>
<div class="row">
	<form action="bestelling.php" method="POST">
		<div class="form-group">
			<input placeholder="naam" type="name" name="name">
			<input placeholder="email" type="email" name="email">
			<input class="btn btn-default" type="submit" value="Order">
		</div>
	</form>
</div>



	<!--here  H ow  T o  M eet  L adies-->
<?php include 'footer.php';?>
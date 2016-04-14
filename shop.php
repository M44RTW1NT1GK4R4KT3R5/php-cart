<?php include 'header.php';?>
<?php include 'database.php';?>
	<!--here  H ow  T o  M eet  L adies-->
<div clas="container">
	<div class="row">

		<?php
			$query = "SELECT * FROM cart_producten";
			$producten = $conn->query($query);
			$result = $producten->fetchAll(PDO::FETCH_ASSOC);
			if($dbcon['debug']){
			      echo "<pre>";
			      print_r( $result);
			      echo "</pre>";
			}
			foreach ( $result as $product) {
		?>
     	<div class="col-md-4 col-xs-12 productlisting">
        	<h2><?= $product['naam'];?></h2>
        	<p> &euro; <?= $product['prijs'];?></p>
        	<a href="./cart.php?pid=<?php echo $product['id']; ?>">Voeg toe aan winkelwagen</a>
      	</div>
      	<?php
    		}
    	?>
	</div>
</div>


	<!--here  H ow  T o  M eet  L adies-->
<?php include 'footer.php';?>
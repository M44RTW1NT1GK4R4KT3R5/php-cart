<?php include 'header.php';?>
<?php include 'database.php';?>
<h1>Gegevens leveranciers</h1>
<table border="1">
	<thead>
		<tr>
			<th>bedrijsnummer</th>
			<th>bedrijfsnaam</th>
			<th>adres</th>
			<th>postode</th>
			<th>plaats</th>
			<th>telefoonnummer</th>
			<th>email</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$query = "SELECT * FROM cart_leveranciers ORDER BY bedrijfsnaam ";
			$bedrijven = $conn->query($query);
			$result = $bedrijven->fetchAll(PDO::FETCH_ASSOC);
			foreach ( $result as $bedrijf) {
		?>
			<tr>
				<td><?=$bedrijf['leveranciersnummer'];?></td>
				<td><?=$bedrijf['bedrijfsnaam'];?></td>
				<td><?=$bedrijf['adres'];?></td>
				<td><?=$bedrijf['postcode'];?></td>
				<td><?=$bedrijf['plaats'];?></td>
				<td><?=$bedrijf['telefoonnummer'];?></td>
				<td><?=$bedrijf['email'];?></td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>






<?php include 'footer.php';?>
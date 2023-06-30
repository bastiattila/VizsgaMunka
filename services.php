<?php include "include/begin.php"; ?>
<?php include "include/delete.php"; ?>

					
<h1>Tekintse meg folyton bővülő kínálatunkat</h1>

<p>Szenvedélyeink a borok, ezért mindig újabb és újabb termékekkel bővítjük az oldal tartalmát.</p>

<section>

	<h2>Boraink:</h2>

	<table>
		<thead>
			<tr>
				<th>Ssz.</th>
				<th>Bor neve</th>
				<th>Bor fajtája</th>
				<th>Pincészet</th>
				<th>Évjárat</th>
				<th>Ár</th>
				<th>Műveletek</th>
			</tr>
		</thead>
		<tbody>
			
		<?php
		include "include/database.php";
			
		$sql = "SELECT * FROM kinalat ";
		$query = $db->query($sql);
		$kinalat = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach($kinalat as $i => $srv) {
			$title = $srv["title"];
			$race = $srv["race"];
			$raiser = $srv["raiser"];
			$vintage = $srv["vintage"];
			$price = (int)$srv["price"];
	
			$price = number_format($price, 0, "", " ");
	
			echo '<tr>
				<th>'. ($i + 1) .'.</th>
				<td>'. $title .'</td>
				<td class="italic">'. $raiser .'</td>
				<td>'. $race .'</td>
				<td>'. $vintage .'</td>
				<td>'. $price .' HUF</td>
				<td><a href="services.php?id='. $srv['id'] .'"><i class="fa fa-trash"></i></a></td>
			</tr>';
		}
		?>
			
		</tbody>
	</table>
	<style>
		.button-container {
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.btn-lightbrown {
			background-color: #928651;
			color: #fff;
		}	
	</style>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="button-container">
					<button class="btn btn-primary btn-block btn-lightbrown" onclick="redirectToNewPage('add.php')">Hozzáadás</button>
				</div>
			</div>
		</div>
	</div>

    
	<script>
		function redirectToNewPage() {
			window.location.href = "add.php";
		}
		function redirectToNewPage2() {
			window.location.href = "buy.php";
		}
	</script>
</section>


<?php include "include/end.php"; ?>	
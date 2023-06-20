<?php include "include/begin.php"; ?>
					
<h1>Tekintse meg folyton bővülő kínálatunkat</h1>

<p>Valami szöveg...</p>

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
			</tr>
		</thead>
		<tbody>
<?php
include "include/database.php";
			
$sql = "SELECT * FROM kinalat ";
$query = $db->query($sql);
$kinalat = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($kinalat as $i => $srv)
{
	$title = $srv["title"];
	$race = $srv["race"];
	$raiser = $srv["raiser"];
	$vintage = $srv["vintage"];
	$price = (int)$srv["price"];
	
	$price = number_format($price, 0, "", " ");
	
	echo '<tr>
			<th>'. ($i +1) .'.</th>
			<td>'. $title .'</td>
			<td class="italic">'. $raiser .'</td>
			<td>'. $race .'</td>
			<td>'. $vintage .'</td>
			<td>'. $price .' HUF</td>
		</tr>';
	
}

?>
			
			
			
		</tbody>
	</table>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="button-container">
                    <button class="btn btn-primary btn-block" onclick="redirectToNewPage('add.php')">Hozzáadás</button>
					<button class="btn btn-primary btn-block" onclick="redirectToNewPage2('buy.php')">Vásárlás</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .button-container {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
	<script>
        function redirectToNewPage() {
            window.location.href = "add.php";
        }
		function redirectToNewPage2() {
            window.location.href = "buy.php";
        }
    </script>
</section>

<article>

	<h2>Rövid leírás címe</h2>
	<p>Rövid leírás maga</p>


</article>
					
<?php include "include/end.php"; ?>	
<?php include "include/functions.php"; ?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<title>Borimádat</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	</head>
	<body>

		<header>
			<div id="siteTitle">
				<img src="media/logo.jpg" alt="Logo"/>
				<a href="index.php">Borimádat</a>
			</div>
			<div class="headerImage" style="background-image:url(media/hd/pohar.jpg)">
				<div class="centerBox">
					<section>
<?php

/*$offers = [
	[
		"title" => "Kihagyhatatlan ajánlat",
		"desc" => "Ilyen lehetőség csak egyszer adódik az életben. Élj hát vele!",
		"button" => "Akarom!"
	],
	[
		"title" => "Csatlakozz hozzánk!",
		"desc" => "Légy Te is lelkes csapatunknak a tagja. Sok szeretettel várunk.",
		"button" => "Csatlakozom"
	],
	[
		"title" => "Újabb kupon akciók",
		"desc" => "Vedd igénybe szolgáltatásainkat most és részesülj minél több kedvezményben!",
		"button" => "Részletek"
	],
	[
		"title" => "Egy újabb ajánlat",
		"desc" => "Ez most már a tömbben tárolt ajánlatok egyike.",
		"button" => "Működik!"
	]
];
						
$r = rand(0, count($offers) -1);
$offer = $offers[$r];
						
echo '<h3>'. $offer["title"] .'</h3>
	<p>'. $offer["desc"] .'</p>
	<a href="">'. $offer["button"] .'</a>';*/
						
/*			
$r = rand(1, 3);

if($r == 1)
{
	$title = "Kihagyhatatlan ajánlat";
	$desc = "Ilyen lehetőség csak egyszer adódik az életben. Élj hát vele!";
	$button = "Akarom!";
}
else
if($r == 2)
{
	$title = "Csatlakozz hozzánk!";
	$desc = "Légy Te is lelkes csapatunknak a tagja. Sok szeretettel várunk.";
	$button = "Csatlakozom";
}
else
{
	$title = "Újabb kupon akciók";
	$desc = "Vedd igénybe szolgáltatásainkat most és részesülj minél több kedvezményben!";
	$button = "Részletek";
}
						
echo '<h3>'. $title .'</h3>
	<p>'. $desc .'</p>
	<a href="">'. $button .'</a>';
*/
?>
					</section>
				</div>
			</div>
			<nav>
				<ul class="centerBox">
					<?php printMenu(); ?>
				</ul>
			</nav>
		</header>
		
		<div id="page">
			<div class="centerBox">
				<main id="content">
				
					<!-- MAIN CONTENT -->
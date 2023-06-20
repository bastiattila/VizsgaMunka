<?php include "include/begin.php"; ?>

<h1>Üdvözöljük honlapunkon!</h1>

<article>
<?php
	
$intro = file_get_contents("content/home-intro.txt");
$text = file_get_contents("content/home-text.txt");
$image = "media/fooldalkep.jpg";
	
echo '<h2 class="lead">'. $intro .'</h2>
	<img src="'. $image .'" alt="Mauris ac nisi felis">
	<p>'. nl2br($text) .'</p>';
	
?>
	<h2>Oldal laírásának címe</h2>
	<p>Oldal leírása</p>

</article>
<?php

$why = [
	"Mert mi hatékonyan dolgozunk",
	"Mert a legjobb árakat kínáljuk",
	"Mert a piac vezetői vagyunk",
	"Mert a legmegbízhatóbb cég vagyunk",
	"Mert rajtunk kivül nincs is más"
];
					
echo '<section>
		<h3>Miért érdemes minket választani?</h3>
		<ul>';

foreach($why as $item)
{
	echo '<li>'. $item .'</li>';
}
/*
for($i = 0; $i < count($why); $i++)
{
	$item = $why[$i];
	echo '<li>'. $item .'</li>';
}
*/
echo '</ul>
	</section>';
					
?>

<?php include "include/end.php"; ?>		

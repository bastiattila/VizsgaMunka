

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
	<h2>Az ország "legnépszerűbb" borászata!</h2>
	<p>Bár a természet a világ borvidékei közül a Boralja-Hegyaljának méri az édességet a legnagyobb bőségben, a termés nagy részét ezen a vidéken a száraz tételek adják. Éppen ezért érdekes, hogy az írott forrásokban csak meglehetősen későn, a XVIII. század elején tűnt fel a legegyszerűbb, száraz tokaji bortípus megnevezése, az ordinárium.</p>

	<h2>A fajtaborok</h2>
<p>Az egykori ordinárium mai utódai azok a fajtaborok, amelyek szinte kizárólag fajtatisztán kerülnek forgalomba, mint Boraljai Furmint, Boraljai Hárslevelű, Boraljai Sárga Muskotály vagy Boraljai Zéta (Oremus). Nincs viszont már messze az az idő sem, amikor ismét népszerűvé válnak a különböző szőlőfajták értékeit ötvöző cuveé-k.

A boraljai száraz borok minőségi és különleges minőségi besorolásúak lehetnek. Az utóbbi jelzőt akkor illeszthetik egy tételhez, ha a bor alapanyagául szolgáló must cukortartalma elérte a 19 mustfokot. A különleges minőségű borok között találjuk a “töppedt szőlőből készült” vagy “késői szüretelésű” édesborokat is. Ez utóbbi megnevezések azonban csak a legutóbbi időben, az elmúlt hat-nyolc évben tűntek fel.

Meg kell jegyeznünk, hogy bár ma kizárólag fehér szőlő telepítését engedélyezik Boralja-Hegyalján, korábban -igaz, csak kis mennyiségben- vörösbort termeltek errefelé. A filoxéravész előtt a borvidéken ott virított még a Cabernet, a Kékoportó, a Kékfrankos és a Purcsin.</p>

</article>
<?php

$why = [
	"Mert mi hatékonyan dolgozunk",
	"Mert a legjobb árakat kínáljuk",
	"Mert a piac vezetői vagyunk",
	"Mert a legmegbízhatóbb cég vagyunk"
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



<div id="cookie-container">
    <p>Ez a weboldal sütiket használ a jobb felhasználói élmény érdekében. </p> 
    <button id="accept-cookie" class="btn btn-warning">Elfogadás</button>
</div>

<script>
    // Függvény a cookie ablak eltüntetéséhez
    function hideCookieConsent() {
        var cookieContainer = document.getElementById("cookie-container");
        cookieContainer.style.display = "none";
    }

    // Az "Elfogadás" gombra kattintva elrejti a cookie ablakot és beállítja a sütit
    var acceptButton = document.getElementById("accept-cookie");
    acceptButton.addEventListener("click", function() {
        hideCookieConsent();
        // Itt lehetne kód a süti beállítására, ha szükséges
    });
</script>



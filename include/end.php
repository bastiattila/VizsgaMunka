					<!-- END: MAIN CONTENT -->
				
				</main>
				
				<aside>
<?php
date_default_timezone_set("Europe/Budapest");
					
$open = 8;
$close = 16;
					
$now = (int)date("H");
$info = "Ügyfélszolgálatunk jelenleg elérhető";

if($now < $open)
{
	$next = $open - $now;
	$info = "Ügyfélszolgálatunk jelenleg még zárva tart, legközelebb ". $next ." óra múlva léphet kapcsolatba velünk";
}
else
if($close <= $now)
{
	$next = 24 - $now + $open;
	$info = "Ügyfélszolgálatunk a mai napon már nem elérhető, legközelebb ". $next ." óra múlva léphet kapcsolatba velünk";
}
					
echo '<section>
		<h3>Ügyfélszolgálat</h3>
		<p>Telefon: +36 30 123 45 67</p>
		<p>Nyitvatartás: H-V, '. $open .'-'. $close .' óráig</p>
		<p>'. $info .'</p>
	</section>';
					
?>
					
					
	<style>
		footer ul
		{
			color: black;
		}
	</style>
					
					
					
					<section>
						<h3>Aktuális ajánlatunk</h3>
						<p>
							Nyári kedvezmény! Minden borunkra 15%-os kedvezmény lépett életbe 2023.augusztus végéig.
						</p>
					</section>
				
					<section>
						<h3>Kínálatunk</h3>
						<img src="media/kinalat.jpg" alt="kinalatkep">
						<p>Tekintse meg kínálatunkat és rendeljen akár házhoz is.</p>
						<p><a href="services.php">Bővebben</a></p>
					</section>
				
					<section>
						<h3>Partnereink</h3>
						<ul>
							<li><a href="https://frittmann.hu/" target="_blank">Frittmann Borászat</a></li>
							<li><a href="https://www.kochboraszat.hu/" target="_blank">Koch Borászat</a></li>
							<li><a href="https://dubicz.hu/" target="_blank">Dubicz Borászat</a></li>
						</ul>
					</section>
				
				</aside>
			</div>
		</div>
		
		<footer>
			<div class="centerBox">
				<div class="left">
					<h4>Csatlakozz online közösségeinkhez!</h4>
					<p>Elérhetsz minket közösségi média felületeken is, de akár telefonon és e-mailben is szívesen fogadjuk a megkereséseket.</p>
					<p>A kapcsolatok menüpont alatt minden elérhetősget megtalálsz. Ne maradj ki semmiből!</p>
				</div>
				<div class="right">
					<h4>Oldaltérkép</h4>
					<ul><?php printMenu(); ?></ul>
				</div>
			</div>
		</footer>
		
		

	</body>
</html>
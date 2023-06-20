<?php include "include/begin.php"; ?>
					
<h1>Bármikor bizalommal fordulhat felénk</h1>

<p id="costumerOpinion">Panasz, észrevétel, pozitív vagy negavít értékelés esetén is szívesen fogadjuk véleményét. Kérjük a Vendékönyv részt kitöltve írja meg számunka tapasztalatait. Köszönjük!</p>

<section>

	<h2>Vendégkönyv</h2>
<?php
include "include/database.php";
	
if( isset($_POST["sendEmail"]) )
{
	$name = trim( $_POST["name"] );
	$email = trim( $_POST["email"] );
	$rating = $_POST["subject"];
	$message = trim( $_POST["message"] );
	
	$error = null;
	
	if(strlen($name) < 2){ $error = "Valós név megadása kötelező!"; }
	else if(strlen($email) < 6){ $error = "Valós e-mail cím megadása kötelező!"; }
	else if(strlen($message) < 2){ $error = "Üzenet megadása kötelező!"; }
	
	if($error)
	{
		echo '<p class="error">'. $error .'</p>';	
	}
	else
	{
		echo '<p class="success">Bejegyzésed tároltuk! Köszönjük!</p>';
		
		$file = fopen("content/customerbook.txt", "a");
		
		fwrite($file, $name . PHP_EOL);
		fwrite($file, $email . PHP_EOL);
		fwrite($file, $rating . PHP_EOL);
		fwrite($file, $message . PHP_EOL);
		fwrite($file, date("Y.m.d. H:i") . PHP_EOL);
		fwrite($file, "------" . PHP_EOL);
		
		fclose($file);
	}
}
	
?>
	<form method="post" action="contact.php">
		<div>
			<label for="inputName">Az Ön neve</label>
			<input type="text" name="name" id="inputName" maxlength="50">
		</div>
		<div>
			<label for="inputEmail">E-mail címe</label>
			<input type="email" name="email" id="inputEmail" maxlength="256">
		</div>
		<div>
			<label for="inputSubject">Szolgáltatás értékelése</label>
			<select name="subject" id="inputSubject">
				<option value="3">Kiváló</option>
				<option value="2">Megfelelő</option>
				<option value="1">Elégséges</option>
				<option value="0">Kritikuán aluli</option>
			</select>
		</div>
		<div>
			<label for="inputMessage">Üzenet törzse</label>
			<textarea name="message" id="inputMessage" maxlength="1000"></textarea>
		</div>
		<div>
			<button name="sendEmail">Küldés</button>
		</div>
	</form>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2767.945840554741!2d18.229944715845733!3d46.07212107911286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4742b1756299ca3d%3A0xf09a2a09f11e20bf!2zw4Fya8OhZA!5e0!3m2!1shu!2shu!4v1665683363191!5m2!1shu!2shu" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</section>
<div class="contact">
<section class="info">
                       <h2>Borimádat Kft.</h2>
                       <p>1234 Város neve, Utca neve 1/A. <br>
                           <span>Email:</span> borimadat@gmail.com <br><span>Telefon:</span> 30/123 4567 <br>
                           <span>Ügyvezető:</span> Básti Attila <br> <!-- span - nincs jelentése, szövegközi elem, mint a div, csak ez a ul-on belül van -->
                       </p>
</section>
<section class="social">
                        <h3>Közösségi média</h3>
                        <ul>
                            <li><a href="https://facebook.com" target="_blank">Facebook oldalunk</a></li><li><a href="https://youtube.com" target="_blank">Youtube csatonánk</a></li><li><a href="https://instagram.com" target="_blank">Instagram profilunk</a></li><li><a href="https://twitter.com" target="_blank">Twitter fiókunk</a></li>
                        </ul>
                </section>
</div>


					
<?php include "include/end.php"; ?>	
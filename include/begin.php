<?php include "include/functions.php"; ?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<title>Borimádat</title>
		<link href="include/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>

		<header>
	<div class="headerImage" style="background-image:url(media/hd/szolo.jpg)">
		<img src="media/logo.jpg" alt="Logo" id="logo"/>
		<a href="index.php" id="headerTitle">Borimádat</a>
		<div class="centerBox">
			<section>

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
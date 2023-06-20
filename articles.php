<?php 
include "include/begin.php";
	
if( !isset($_GET["read"]) )
{
	echo '<h1>Saját publikációk</h1>
			<ul class="articles">';
	
	$x = 1;
	$file = "content/articles/article-". $x .".txt";

	while( is_file($file) )
	{
		$article = file_get_contents($file);
		$article = explode(";", $article);

		$title = $article[0];
		$image = $article[1];
		$intro = $article[2];

		echo '<li class="preview">
			<img src="'. $image .'" alt="Mauris ac nisi felis">
			<div><h2>'. $title .'</h2><p>'. $intro .'</p></div>
			<a href="articles.php?read='. $x .'">Bővebben</a></li>';

		$x++;
		$file = "content/articles/article-". $x .".txt";
	}
	
	echo '</ul>';
}
else
{
	$x = $_GET["read"];
	$file = "content/articles/article-". $x .".txt";
	
	if( is_file($file) )
	{
		$article = file_get_contents($file);
		$article = explode(";", $article);

		$title = $article[0];
		$image = $article[1];
		$intro = $article[2];
		$content = $article[3];

		echo '<h1>'. $title .'</h1><article>
			<h2 class="lead">'. $intro .'</h2>
			<img src="'. $image .'" alt="Mauris ac nisi felis">
			'. $content .'</article>';
	}
	else
	{
		echo '<h1>A keresett cikk nem található</h1>';
	}
}

include "include/end.php"; 
?>	
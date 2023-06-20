<?php 

$dbName = "vizsga";
$dbUser = "root";
$dbPass = "mysql";

$dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";

$db = new PDO($dsn, $dbUser, $dbPass);



?>
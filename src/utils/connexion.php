<?php

include("dbconfig.php");

try {
	$cnx = new PDO('mysql:host=' . $host . ':' . $port . ';dbname=' . $dbname, $username, $password);
	echo '<p class="badge bg-success m-2">connexion réussie</p>';
} catch (PDOException $e) {
	echo '<p class="badge bg-danger m-2">erreur de connexion</p>';
	// echo "error : " . $e->getMessage();
	// echo "code : " . $e->getCode();
}

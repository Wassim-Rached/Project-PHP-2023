<?php

	include("./dbconfig.php");

	try {
		$connection = new PDO('mysql:host='.$host.':'.$port.';dbname='.$dbname,$username,$password);
		echo 'connexion réussie';
	} catch (PDOException $e) {
		echo "error : ".$e->getMessage();
		echo "code : ".$e->getCode();
	}


?>
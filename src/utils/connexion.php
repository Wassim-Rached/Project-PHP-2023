<?php

	include("dbconfig.php");
	
	try {
		$cnx = new PDO('mysql:host='.$host.':'.$port.';dbname='.$dbname,$username,$password);
		echo '<p>connexion réussie</p>';
	} catch (PDOException $e) {
		echo "error : ".$e->getMessage();
		echo "code : ".$e->getCode();
	}


?>
<?php

	if (!isset($_GET['NCE'])) {
		exit('NCE is required');
	}

	include('../utils/connexion.php');

	$NCE = $_GET['NCE'];

	$query = 'SELECT * FROM Etudiant WHERE NCE = ' . $NCE;
	$req = $cnx->query($query);
	$etudiant = $req->fetch();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$mutation = "DELETE FROM Etudiant WHERE NCE = :NCE";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(':NCE', $NCE);
	
		$statement->execute();
	
		header('Location: ./liste_etudiants.php');
		exit('etudiant supprimé');
	}

?>

<ul>
	<li><?php echo 'NCE :'. $etudiant['NCE']; ?></li>
	<li><?php echo 'nom :'. $etudiant['nom']; ?></li>
	<li><?php echo 'prenom :'. $etudiant['prenom']; ?></li>
	<li><?php echo 'classe :'. $etudiant['classe']; ?></li>
</ul>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<button type="submit">supprimer</button>
</form>
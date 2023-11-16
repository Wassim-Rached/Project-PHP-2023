<?php

	if (!isset($_GET['NCE'])) {
		exit('NCE is required');
	}

	include('../utils/connexion.php');

	$query = 'SELECT * FROM Etudiant WHERE NCE = ' . $_GET['NCE'];
	$req = $cnx->query($query);
	$etudiant = $req->fetch();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$NCE = $_POST['NCE'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$classe = $_POST['classe'];

		$mutation = "UPDATE Etudiant SET nom = ?, prenom = ?, classe = ? WHERE NCE = ?";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(1, $nom);
		$statement->bindParam(2, $prenom);
		$statement->bindParam(3, $classe);
		$statement->bindParam(4, $NCE);

		$success = $statement->execute();

		if ($success) {
			echo "Etudiant modifié avec succès";
		} else {
			echo "Aucune modification n'a été apportée";
		}
	}


?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label for="NCE">NCE</label>
		<input type="text" name='NCE' value="<?php echo $etudiant['NCE'] ?>" readonly/>
	</div>
	<div>
		<label for="nom">Nom</label>
		<input type="text" name='nom' value="<?php echo $etudiant['nom'] ?>"/>
	</div>
	<div>
		<label for="prenom">Prenom</label>
		<input type="text" name='prenom' value="<?php echo $etudiant['prenom'] ?>"/>
	</div>
	<div>
		<label for="classe">classe</label>
		<input type="text" name='classe' value="<?php echo $etudiant['classe'] ?>"/>
	</div>
	<button type="submit">save</button>
</form>
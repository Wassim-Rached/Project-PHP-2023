<?php

	include('../utils/adminOnlyPage.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		include('../utils/connexion.php');
		$NCE = $_POST['NCE'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$classe = $_POST['classe'];

		$mutation = "INSERT INTO Etudiant (NCE, nom, prenom, classe) VALUES (?, ?, ?, ?)";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(1, $NCE);
		$statement->bindParam(2, $nom);
		$statement->bindParam(3, $prenom);
		$statement->bindParam(4, $classe);
	
		$success = $statement->execute();
		
		if ($success) {
			echo "Etudiant ajouté avec succès";
		}else{
			echo "Erreur lors de l'ajout de l'étudiant";
		}
	}
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label for="NCE">NCE</label>
		<input type="number" name='NCE'/>
	</div>
	<div>
		<label for="nom">Nom</label>
		<input type="text" name='nom'/>
	</div>
	<div>
		<label for="prenom">Prenom</label>
		<input type="text" name='prenom'/>
	</div>
	<div>
		<label for="classe">classe</label>
		<input type="text" name='classe'/>
	</div>
    <button type="submit">create</button>
</form>
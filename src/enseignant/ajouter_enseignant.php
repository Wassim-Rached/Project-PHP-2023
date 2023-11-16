<?php

	include('../utils/adminOnlyPage.php');

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		include('../utils/connexion.php');
		$Matricule = $_POST['Matricule'];
		$nom_Ens = $_POST['nom_Ens'];
		$prenom_Ens = $_POST['prenom_Ens'];

		$mutation = "INSERT INTO Enseignant (Matricule, nom_Ens, prenom_Ens) VALUES (?, ?, ?)";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(1, $Matricule);
		$statement->bindParam(2, $nom_Ens);
		$statement->bindParam(3, $prenom_Ens);
	
		$success = $statement->execute();
		if ($success) {
			echo "Enseignant ajouté avec succès";
		}else{
			echo "Erreur lors de l'ajout de l'enseignant";
		}
	}
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label for="Matricule">Matricule</label>
		<input type="number" name='Matricule'/>
	</div>
	<div>
		<label for="nom_Ens">nom_Ens</label>
		<input type="text" name='nom_Ens'/>
	</div>
	<div>
		<label for="prenom_Ens">prenom_Ens</label>
		<input type="text" name='prenom_Ens'/>
	</div>
    <button type="submit">create</button>
</form>
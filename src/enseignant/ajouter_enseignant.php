<?php

include('../utils/adminOnlyPage.php');

include('../utils/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
	} else {
		echo "Erreur lors de l'ajout de l'enseignant";
	}
}
?>
<div class="container">
	<h1>
		Ajouter un enseignant
	</h1>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<div>
			<label class="form-label" for="Matricule">Matricule</label>
			<input class="form-control" type="number" name='Matricule' />
		</div>
		<div>
			<label class="form-label" for="nom_Ens">nom_Ens</label>
			<input class="form-control" type="text" name='nom_Ens' />
		</div>
		<div>
			<label class="form-label" for="prenom_Ens">prenom_Ens</label>
			<input class="form-control" type="text" name='prenom_Ens' />
		</div>
		<button type="submit" class='btn btn-primary mt-3'>create</button>
	</form>
</div>


<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
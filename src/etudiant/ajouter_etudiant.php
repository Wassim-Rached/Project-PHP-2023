<?php

include('../utils/adminOnlyPage.php');

include('../utils/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$NCE = $_POST['NCE'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$classe = $_POST['classe'];

	try {
		$mutation = "INSERT INTO Etudiant (NCE, nom, prenom, classe) VALUES (?, ?, ?, ?)";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(1, $NCE);
		$statement->bindParam(2, $nom);
		$statement->bindParam(3, $prenom);
		$statement->bindParam(4, $classe);

		$success = $statement->execute();
	} catch (\Throwable $th) {
		//throw $th;
	}
}
?>

<div class="container">
	<h1>
		Ajouter un étudiant
	</h1>
	<?php if (isset($success)) : ?>
		<?php if ($success) : ?>
			<div class='alert alert-success'>Etudiant modifié avec succès</div>
		<?php else : ?>
			<div class='alert alert-danger'>Aucune modification n'a été apportée</div>
		<?php endif ?>
	<?php endif ?>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<div>
			<label class="form-label" for="NCE">NCE</label>
			<input class="form-control" type="number" name='NCE' />
		</div>
		<div>
			<label class="form-label" for="nom">Nom</label>
			<input class="form-control" type="text" name='nom' />
		</div>
		<div>
			<label class="form-label" for="prenom">Prenom</label>
			<input class="form-control" type="text" name='prenom' />
		</div>
		<div>
			<label class="form-label" for="classe">classe</label>
			<input class="form-control" type="text" name='classe' />
		</div>
		<button type="submit" class='btn btn-primary mt-3'>create</button>
	</form>
</div>


<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
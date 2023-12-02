<?php

include('../utils/adminOnlyPage.php');

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
}

?>
<div class="container">
	<h1>
		Modifier un étudiant
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
			<label class='form-label' for="NCE">NCE</label>
			<input class='form-control' type="text" name='NCE' value="<?php echo $etudiant['NCE'] ?>" readonly />
		</div>
		<div>
			<label class='form-label' for="nom">Nom</label>
			<input class='form-control' type="text" name='nom' value="<?php echo $etudiant['nom'] ?>" />
		</div>
		<div>
			<label class='form-label' for="prenom">Prenom</label>
			<input class='form-control' type="text" name='prenom' value="<?php echo $etudiant['prenom'] ?>" />
		</div>
		<div>
			<label class='form-label' for="classe">classe</label>
			<input class='form-control' type="text" name='classe' value="<?php echo $etudiant['classe'] ?>" />
		</div>
		<button type="submit" class="btn btn-primary mt-3">save</button>
	</form>
</div>


<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
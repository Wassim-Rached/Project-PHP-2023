<?php

include('../utils/adminOnlyPage.php');

include('../utils/connexion.php');

try {
	$query = 'SELECT * FROM Etudiant';
	$req = $cnx->query($query);
	$etudiants = $req->fetchAll();
} catch (\Throwable $th) {
	// 
}

?>

<div class="container">
	<h1>Liste des étudiants</h1>
	<table class="table table-bordered table-dark ">
		<thead>
			<tr>
				<th>NCE</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Classe</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($etudiants as $etudiant) { ?>
				<tr>
					<td><?php echo $etudiant['NCE']; ?></td>
					<td><?php echo $etudiant['nom']; ?></td>
					<td><?php echo $etudiant['prenom']; ?></td>
					<td><?php echo $etudiant['classe']; ?></td>
					<td>
						<a class="btn btn-warning" href="modifier_etudiant.php?NCE=<?php echo $etudiant['NCE']; ?>">Modifier</a>
					</td>
					<td>
						<a class="btn btn-danger" href="supprimer_etudiant.php?NCE=<?php echo $etudiant['NCE']; ?>">Supprimer</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
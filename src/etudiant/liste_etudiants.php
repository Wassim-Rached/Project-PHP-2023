<?php

	include('../utils/adminOnlyPage.php');

	include('../utils/connexion.php');

	$query = 'SELECT * FROM Etudiant';
	$req = $cnx->query($query);
	$etudiants = $req->fetchAll();

?>

<style>
	table {
		border-collapse: collapse;
	}

	th, td {
		border: 1px solid black;
		padding: 5px;
	}
</style>

<table>
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
					<a href="modifier_etudiant.php?NCE=<?php echo $etudiant['NCE']; ?>">Modifier</a>
				</td>
					<td>
					<a href="supprimer_etudiant.php?NCE=<?php echo $etudiant['NCE']; ?>">Supprimer</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
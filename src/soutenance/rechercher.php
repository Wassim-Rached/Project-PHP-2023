<?php

	include('../utils/adminOnlyPage.php');

	include('../utils/connexion.php');

	$query = 'SELECT Matricule,nom_Ens FROM Enseignant';
	$req = $cnx->query($query);
	$enseignants = $req->fetchAll();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$Matricule = $_POST['Matricule'];
		$date = '2023-12-15';

		$query = 'SELECT * FROM Soutenance WHERE Matricule = :Matricule AND date_soutenance = :date';
		$statement = $cnx->prepare($query);
		$statement->bindParam(':Matricule', $Matricule);
		$statement->bindParam(':date', $date);
		$statement->execute();
	
		$soutenances = $statement->fetchAll();
	}
	


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

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<select name="Matricule">
			<?php foreach ($enseignants as $enseignant) { ?>
				<option value="<?php echo $enseignant['Matricule']; ?>"><?php echo $enseignant['nom_Ens']; ?></option>
			<?php } ?>
		</select>
	</div>
	<button type="submit">search</button>
</form>

<?php if(!isset($soutenances)) exit('choisie enseignant') ?>

<table>
	<thead>
		<tr>
			<th>Numjury</th>
			<th>date_soutenance</th>
			<th>note</th>
			<th>Nce</th>
			<th>Matricule</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($soutenances as $soutenance) { ?>
			<tr>
				<td><?php echo $soutenance['Numjury']; ?></td>
				<td><?php echo $soutenance['date_soutenance']; ?></td>
				<td><?php echo $soutenance['note']; ?></td>
				<td><?php echo $soutenance['Nce']; ?></td>
				<td><?php echo $soutenance['Matricule']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
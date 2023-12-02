<?php

include('../utils/adminOnlyPage.php');

include('../utils/connexion.php');

$query = 'SELECT Matricule,nom_Ens FROM Enseignant';
$req = $cnx->query($query);
$enseignants = $req->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$Matricule = $_POST['Matricule'];
	$date = $_POST['date'];

	$query = 'SELECT * FROM Soutenance WHERE Matricule = :Matricule AND date_soutenance = :date';
	$statement = $cnx->prepare($query);
	$statement->bindParam(':Matricule', $Matricule);
	$statement->bindParam(':date', $date);
	$statement->execute();

	$soutenances = $statement->fetchAll();
}



?>


<div class="container">
	<h1>
		Rechercher une soutenance
	</h1>

	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<div>
			<label class="form-label" for="Matricule">enseignant</label>
			<select class="form-select" name="Matricule">
				<?php foreach ($enseignants as $enseignant) { ?>
					<option value="<?php echo $enseignant['Matricule']; ?>"><?php echo $enseignant['nom_Ens']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div>
			<label class="form-label" for="date">date</label>
			<input class="form-control" type="date" name="date" value="2023-12-15" required>
		</div>
		<button type="submit" class="btn btn-primary mt-3">search</button>
	</form>

	<table class="table table-bordered table-dark mt-4">
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
</div>

<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
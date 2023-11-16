<?php
	
	include('../utils/connexion.php');

	$query = 'SELECT NCE,nom FROM Etudiant';
	$req = $cnx->query($query);
	$etudiants = $req->fetchAll();

	$query = 'SELECT Matricule,nom_Ens FROM Enseignant';
	$req = $cnx->query($query);
	$enseignants = $req->fetchAll();


	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$Numjury = $_POST['Numjury'];
		$date_soutenance = $_POST['date_soutenance'];
		$note = $_POST['note'];
		$etudiant = $_POST['etudiant'];
		$enseignant = $_POST['enseignant'];

		$mutation = "INSERT INTO Soutenance (Numjury, date_soutenance, note, NCE, Matricule) VALUES (?, ?, ?, ?, ?)";
		$statement = $cnx->prepare($mutation);
		$statement->bindParam(1, $Numjury);
		$statement->bindParam(2, $date_soutenance);
		$statement->bindParam(3, $note);
		$statement->bindParam(4, $etudiant);
		$statement->bindParam(5, $enseignant);
	
		$success = $statement->execute();
		
		if ($success) {
			echo 'Soutenance ajoutée avec succès';
		}else{
			echo 'Echec d\'ajout de la soutenance';
		}
	}
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
		<label for="Numjury">Numjury</label>
		<input type="number" name="Numjury" required>
	</div>
	<div>
		<label for="date_soutenance">date_soutenance</label>
		<input type="date" name="date_soutenance" required>  
	</div>
	<div>
		<label for="note">note</label>
		<input type="number" name="note" required>
	</div>
	<div>
		<select name="etudiant">
			<?php foreach ($etudiants as $etudiant): ?>
				<option value="<?php echo $etudiant['NCE'] ?>"><?php echo $etudiant['nom'] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div>
		<select name="enseignant">
			<?php foreach ($enseignants as $enseignant): ?>
				<option value="<?php echo $enseignant['Matricule'] ?>"><?php echo $enseignant['nom_Ens'] ?></option>
			<?php endforeach ?>
		</select>
	</div>

    <button type="submit">create</button>
</form>
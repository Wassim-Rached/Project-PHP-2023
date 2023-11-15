<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('utils/connexion.php');
    
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $query = 'SELECT * FROM Administrateur WHERE login = :login AND mot_de_passe = :mot_de_passe';
    $statement = $cnx->prepare($query);

    $statement->bindParam(':login', $login);
    $statement->bindParam(':mot_de_passe', $mot_de_passe);
    $statement->execute();

	$row = $statement->fetch();

	if ($row) {
		session_start();

		$_SESSION['login'] = $row['login'];

		header('Location: index.php');
	} else {
		echo 'Login failed';
	}
}

?>

<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <label for="login">login:</label>
    <input type="text" id="login" name="login" required>

    <label for="mot_de_passe">mot_de_passe:</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>

    <button type="submit">Login</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('utils/connexion.php');
    
    // Handle form submission
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Use prepared statement to prevent SQL injection
    $query = 'SELECT * FROM Administrateur WHERE login = :login AND mot_de_passe = :mot_de_passe';
    $statement = $cnx->prepare($query);

    // Bind parameters
    $statement->bindParam(':login', $login);
    $statement->bindParam(':mot_de_passe', $mot_de_passe);

    // Execute the prepared statement
    $statement->execute();

    // Fetch results
	$row = $statement->fetch();

	// check if the user exists
	if ($row) {
		// start the session
		session_start();

		// store data in SESSION variables
		$_SESSION['login'] = $row['login'];

		// redirect to the home page
		header('Location: index.php');
	} else {
		// display error message
		echo 'Login failed';
	}
}

?>

<form method="POST">
    <label for="login">login:</label>
    <input type="text" id="login" name="login" required>

    <label for="mot_de_passe">mot_de_passe:</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required>

    <button type="submit">Login</button>
</form>

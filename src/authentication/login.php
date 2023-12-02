<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
        $error = 'login ou mot de passe incorrect';
    }
}

?>
<div class="container">
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $error ?>
        </div>
    <?php endif ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div>
            <label class="form-label" for="login">login:</label>
            <input class="form-control" type="text" id="login" name="login" required>
        </div>
        <div>
            <label class='form-label' for="mot_de_passe">mot_de_passe:</label>
            <input class='form-control' type="password" id="mot_de_passe" name="mot_de_passe" required>
        </div>


        <button type="submit" class="btn btn-primary mt-3">Login</button>
    </form>
</div>


<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
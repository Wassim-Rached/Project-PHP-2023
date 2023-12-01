<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	session_start();

	if (isset($_SESSION['login'])) {
		$_SESSION = array();

		session_destroy();

		header('Location: index.php');
	} else {
		header("Location: index.php");
	}
}
?>
<div class="container">
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		<button type="submit" class='btn btn-danger'>Logout</button>
	</form>
</div>
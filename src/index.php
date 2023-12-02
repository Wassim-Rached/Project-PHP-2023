<?php

include('./utils/connexion.php');
?>

<div class="container">
	<h1 class='text-center'>
		Welcom to the school management system
	</h1>
</div>

<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION["login"]) {
	include("authentication/logout.php");
} else {
	include("authentication/login.php");
}

?>

<link rel="stylesheet" href="/css/navbar.css">
<script src="/js/navbar.js"></script>
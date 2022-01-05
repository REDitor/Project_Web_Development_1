<?php
session_start();

require_once __DIR__ . '/../services/userservice.php';

if (isset($_POST['login'])) {
	if ($_POST['usernameLogin'] != "" && $_POST['passwordLogin'] != "") {
		$username = $_POST['usernameLogin'];
		$password = md5($_POST['passwordLogin']);

		$user_service = new UserService();
		$user = $user_service->getByUsername($username);
		$_SESSION['username'] = $user->getUsername();
		echo $_SESSION['username'];
		header('location: home');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="/app/public/img/favicon/favicon.svg" />
	<title>Curtains | Home</title>
	<style>
		.loginContainer {
			height: 100vh;
			position: relative;
			margin-top: 15rem;
		}
	</style>
</head>

<body class="bg-white text-dark">
	<section class="loginContainer container w-25 text-center">
		<section class="card p-5">
			<form method="POST">
				<h1>Login</h1>
				<input type="text" name="usernameLogin" placeholder="Enter username" id="usernameLogin"
				       class="form-control mb-3">
				<input type="password" name="passwordLogin" placeholder="Enter password" id="passwordLogin"
				       class="form-control mb-3">
				<button name="login" class="col-12 btn btn-danger btn-block">Login</button>
			</form>
		</section>
	</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
	        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	        crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
	        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
	        crossorigin="anonymous"></script>
</body>
</html>
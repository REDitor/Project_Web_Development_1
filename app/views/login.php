<?php
session_start();

require_once __DIR__ . '/../services/userservice.php';

if (isset($_POST['login'])) {
	$username = $_POST['usernameLogin'];
	$password = $_POST['passwordLogin'];
	if ($username != "" && $password != "") {
		$password = md5($password);

		$user_service = new UserService();
		$_SESSION['user'] = $user_service->getByUsernameAndPassword($username, $password);
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
	<title>Curtains | Login</title>
	<style>
		body {
			background: url("/img/login/moviecurtains.jpg") no-repeat center/cover;
		}

		.overlay {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.6);
		}

		.loginContainer {
			margin-top: 15rem;
		}
	</style>
</head>

<body>
	<section class="overlay"></section>
		<section class="loginContainer container w-25 text-center position-relative">
			<section class="card bg-dark text-white px-5">
				<form method="POST">
					<h1 class="py-4">Login</h1>
					<input type="text" name="usernameLogin" placeholder="Enter username" id="usernameLogin"
					       class="form-control mb-3">
					<input type="password" name="passwordLogin" placeholder="Enter password" id="passwordLogin"
					       class="form-control mb-3">
					<button name="login" class="col-12 btn btn-danger btn-block">Login</button>
					<p class="mt-4"><a class="text-decoration-none text-danger"
					                   href="#">Forgot password?</a></p>
					<p class="mt-4"><small>New to Curtains? <a class="text-decoration-none text-danger"
					                                           href="home#registration">Create an account</a></small>
					</p>
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
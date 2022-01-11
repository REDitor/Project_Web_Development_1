<?php
require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../models/user.php';

session_start();

//register user
if (isset($_SESSION['user'])) {
	$loggedUser = $_SESSION['user'];
} else if (isset($_POST['register'])) {
	if ($_POST['email'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['passConfirm'] != "") {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$passConfirm = $_POST['passConfirm'];

		if ($password == $passConfirm) {
			//encrypt password
			$password = md5($password);

			//TODO: constructor?
			$user = new User();
			$user->setUsername($username);
			$user->setPassword($password);
			$user->setEmail($email);

			$user_service = new UserService();
			$user_service->insertUser($user);
		}
	} else {
		echo "<script>alert('Please fill in all the fields!')</script>
              <script>window.location = 'home#registration'</script>";
	}
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
	<link rel="shortcut icon" href="/img/favicon/favicon.svg" />
	<title>Curtains | Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<!--TODO: make favicon color danger-->
<!--FIXME: sessions not working-->
<!--FIXME: find solution for active nav-->



<body class="bg-white text-dark">
	<header id="hero" class="hero">
		<?php
		include __DIR__ . '/elements/navbar.php';
		?>

		<section
			class="content jumbotron jumbotron-fluid text-light d-flex justify-content-center align-items-center text-center h-100 pt-3 pb-3">
			<?php
			if (isset($_POST['register'])) {
				?>
				<h1 class="display-4">Thank you for registering to Curtains</h1>
				<p class="lead">Your Cinematic Journey Begins!
				</p>
				<a href="login" class="btn btn-danger"><i class="fas fa-chevron-right"></i> Login</a>
				<?php
			} else if (!isset($loggedUser)) {
				?>
				<h1 class="display-4">The Ultimate Climax</h1>
				<p class="lead">Create your own watch lists and start your Cinematic Journey!
				</p>
				<a href="#registration" class="btn btn-danger"><i class="fas fa-chevron-right"></i> Create an
					account</a>
				<?php
			} else {
				?>
				<h1 class="display-4">Welcome <?php echo $loggedUser->getUsername(); ?>.</h1>
				<p class="lead">We are very happy to present you with your very own space for managing your watch lists!
				</p>
				<a href="#" class="btn btn-danger"><i class="fas fa-chevron-right"></i> My Lists</a>
				<?php
			}
			?>
		</section>
	</header>

	<?php
	if (!isset($loggedUser) && !isset($_POST['register'])) {
		?>
		<section id="registration" class="container w-25 m-auto my-5 text-center">
			<h1>Create an account</h1>
			<form method="POST" class="mt-4">
				<input type="email" name="email" placeholder="Enter email" id="email" class="form-control mb-3">
				<input type="text" name="username" placeholder="Enter username" id="username" class="form-control mb-3">
				<input type="password" name="password" placeholder="Enter password" id="password"
				       class="form-control mb-3">
				<input type="password" name="passConfirm" placeholder="Confirm password" id="passConfirm"
				       class="form-control mb-3">
				<button name="register" class="col-12 btn btn-danger btn-block">Register</button>
				<p class="mt-4">Already have an account? <a class="text-decoration-none text-danger"
				                                            href="login">Login</a>
				</p>
			</form>
		</section>
		<?php
	}
	?>

	<footer class="footer bg-dark bottom-0">
		<section class="social">
			<a href="#"><i class="fab fa-facebook fa-2x"></i></a>
			<a href="#"><i class="fab fa-twitter fa-2x"></i></a>
			<a href="#"><i class="fab fa-youtube fa-2x"></i></a>
			<a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
		</section>
		<p class="text-light d-inline">Copyright &copy; 2021 - Curtains</p>
	</footer>

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
<?php
session_start();

require_once __DIR__ . '/../../services/userservice.php';

//register user
if (isset($_SESSION['user'])) {
	$loggedUser = $_SESSION['user'];
} else {
	if (isset($_POST['register'])) {
		if ($_POST['email'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['passConfirm'] != "") {
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$passConfirm = $_POST['passConfirm'];

			if ($password == $passConfirm) {
				//encrypt password
				$password = md5($password);

				$user_service = new UserService();
				$user_service->insertUser(new User(0, $username, $password, $email));

				$_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
			}
		} else {
			echo "<script>alert('Please fill in all the fields!')</script>
              <script>window.location = 'home#registration'</script>";
		}
	}
}

//login user

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
	<style>
		body {
			font-family: 'Open Sans', sans-serif;
			background: #fff;
			color: #333;
			line-height: 1.6;
		}

		.logo {
			flex: none;
			font-weight: 400;
		}

		.navbar ul a:hover {
			border-bottom: #df4759 1px solid;
		}

		.hero {
			background: url("../../../img/home/Cinema_Seats.png") no-repeat center/cover;
			height: 100vh;
			position: relative;
			color: #fff;
		}

		.hero .content {
			flex-direction: column;
		}

		.hero::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.6);
		}

		.hero * {
			z-index: 10;
		}

		#navbar {
			z-index: 9999;
		}
	</style>
</head>
<!--FIXME: imges and css not loading (from seperate files)-->
<!--FIXME: hide registration form if logged in + replace hero with welcome message-->
<!--FIXME: userservice returns a bool, not a user-->


<body class="bg-white text-dark">
	<header id="hero" class="hero">
		<section id="navbar" class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
			<a href="" class="text-decoration-none">
				<h1 class="logo ms-4 mt-2">
					<span class="text-danger"><i class="fas fa-video"></i> Cur</span><span
						class="text-white">tains</span>
				</h1>
			</a>
			<nav class="w-75">
				<section class="container">
					<button class="navbar-toggler" data-toggle="collapse" data-target="#navBurger">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navBurger">
						<ul class="navbar-nav m-auto">
							<li class="nav-item"><a class="nav-link h6 active" href="">Home</a></li>
							<li class="nav-item"><a class="nav-link h6" href="movies">Movies</a></li>
							<li class="nav-item"><a class="nav-link h6" href="shows">Shows</a></li>
							<li class="nav-item"><a class="nav-link h6" href="about">About</a></li>
							<li class="nav-item"><a class="nav-link h6" href="contact">Contact</a></li>

						</ul>
						<ul class="navbar-nav">
							<?php
							if (!isset($_SESSION['user'])) {
								?>
								<li class="nav-item">
									<a class="btn btn-danger btn-sm" type="submit" href="login">Login</a>
								</li>
								<?php
							} else {
								?>
								<li class="nav-item dropdown nav-user">
									<a class="nav-link nav-user-img" href="#" id="userDropdown"
									   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-user"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
									     aria-labelledby="userDropdown">
										<div class="nav-user-info">
											<h5 class="mb-0 text-dark nav-user-name">U are logged in</h5>
										</div>
										<a class="dropdown-item" href="#"><i class="fas fa-bars me-2"></i>My Lists</a>
										<a class="dropdown-item" href="<?php $_SESSION = array();
										session_destroy(); ?>">
											<i class="fas fa-power-off me-2"></i>Logout
										</a>
									</div>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
				</section>

			</nav>
		</section>

		<section
			class="content jumbotron jumbotron-fluid bg-light text-light d-flex justify-content-center align-items-center text-center h-100 pt-3 pb-3">
			<?php
			if (!isset($_SESSION['user'])) {
				echo $_SESSION['user'];
				?>
				<h1 class="display-4">The Ultimate Climax</h1>
				<p class="lead">Create your own watch lists and start your Cinematic Journey!
				</p>
				<a href="#registration" class="btn btn-danger"><i class="fas fa-chevron-right"></i> Create an
					account</a>
				<?php
			} else {
				?>
				<h1 class="display-4">Welcome ...</h1>
				<p class="lead">Create your own watch lists and start your Cinematic Journey!
				</p>
				<?php
			}
			?>
		</section>
	</header>

	<?php
	if (!isset($_SESSION['user'])) {
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
				                                            href="#hero">Login</a>
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
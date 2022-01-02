<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/jpg" href="../../img/favicon/favicon.svg"/>
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

		.navbar {
			opacity: 0.8;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		
		.navbar a:hover {
			border-bottom: #df4759 1px solid;
		}

		.hero {
			background: url("../../img/Cinema_Seats.png") no-repeat center/cover;
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
	</style>
</head>

<!--FIXME: remove whitespace under footer-->
<!--FIXME: imges and css not loading (from seperate files)-->

<body class="bg-white text-dark">
	<header class="hero">
		<section id="navbar" class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
			<h1 class="logo ms-4 mt-1">
				<span class="text-danger"><i class="fas fa-video"></i> Cur</span>tains
			</h1>
			<nav>
				<section class="container">
					<button class="navbar-toggler" data-toggle="collapse" data-target="#navBurger">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navBurger">
						<ul class="navbar-nav">
							<li class="nav-item me-3"><a class="nav-link h6" href="#">Home</a></li>
							<li class="nav-item me-3"><a class="nav-link h6" href="">Movies</a></li>
							<li class="nav-item me-3"><a class="nav-link h6" href="">Shows</a></li>
							<li class="nav-item me-3"><a class="nav-link h6" href="">About</a></li>
							<li class="nav-item me-3"><a class="nav-link h6" href="">Contact</a></li>
							<!--				    TODO: Add profile + dropdown -->
						</ul>
					</div>
				</section>
			</nav>
		</section>

		<section
			class="content jumbotron jumbotron-fluid bg-light text-dark d-flex justify-content-center align-items-center text-center h-100 pt-3 pb-3">
			<h1 class="display-4">The Ultimate Climax</h1>
			<p class="lead">Create your own watch lists and start your Cinematic Journey!
			</p>
			<a href="#" class="btn btn-danger"><i class="fas fa-chevron-right"></i> Create an account</a>
		</section>
	</header>
	
	<footer class="footer bg-dark m-0">
		<section class="social">
			<a href="#"><i class="fab fa-facebook fa-2x"></i></a>
			<a href="#"><i class="fab fa-twitter fa-2x"></i></a>
			<a href="#"><i class="fab fa-youtube fa-2x"></i></a>
			<a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
		</section>
		<p class="text-light">Copyright &copy; 2021 - Curtains</p>
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
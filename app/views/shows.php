<?php
session_start();
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
	<link rel="stylesheet" type="text/css" href="listings.css">
</head>

<body class="bg-white text-dark">
	<header id="hero" class="hero">
		<section id="navbar" class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
			<a href="" class="text-decoration-none d-inline-block">
				<h1 class="logo ms-4 mt-2">
					<span class="text-danger"><i class="fas fa-video"></i> Cur</span><span
						class="text-white">tains</span>
				</h1>
			</a>
			<nav>
				<section class="container">
					<button class="navbar-toggler" data-toggle="collapse" data-target="#navBurger">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse m-auto" id="navBurger">
						<ul class="navbar-nav m-auto">
							<li class="nav-item"><a class="nav-link h6" href="home">Home</a></li>
							<li class="nav-item"><a class="nav-link h6" href="movies">Movies</a></li>
							<li class="nav-item"><a class="nav-link h6 active" href="shows">Shows</a></li>
							<li class="nav-item"><a class="nav-link h6" href="about">About</a></li>
							<li class="nav-item"><a class="nav-link h6" href="contact">Contact</a></li>

						</ul>
						<ul class="navbar-nav">
							<?php
							if (!isset($loggedUser)) {
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
									<div class="dropdown-menu dropdown-menu-left nav-user-dropdown"
									     aria-labelledby="userDropdown">
										<div class="nav-user-info">
											<h5 class="mb-0 text-dark nav-user-name"><?php echo $loggedUser->getUsername(); ?></h5>
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
	</header>

	<section id="page-container">
		<section id="movie-container">
			<section class="container">
				<ol class="breadcrumb pt-2">
					<li class="breadcrumb-item">
						<a class="text-decoration-none text-danger" href="home">Home</a>
					</li>
					<li class="breadcrumb-item active">Shows</li>
				</ol>
				<h2>Shows</h2>
				<section class="row pb-5">
					<?php
					require_once __DIR__ . '/../services/showsservice.php';
					$show_service = new ShowsService();

					foreach ($show_service->getAll() as $show) {
						require_once __DIR__ . '/scripts/getimagename.php';
						?>
						<section class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 px-2 py-3">
							<section class="card product-card h-100">
								<img src=" <?php echo '/img/shows/' . getImageName($show) . '.jpg' ?>"
								     alt="<?php getImageName($show); ?>"
								     title="<?php $show->getTitle(); ?>>"
								     class="card-img-top w-100">

								<section class="card-footer px-2">
									<p class="card-title"><?php echo $show->getTitle(); ?></p>
									<section class="float-start">
										<p class="card-text"><small>By: <?php echo $show->getWriter(); ?><br>
												<?php echo $show->getNumberOfEpisodes(); ?> episodes</small>
										</p>
									</section>
									<button name="addToList"
									        class="btn btn-danger float-end w-25 h-50 fa-regular fa-bookmark"></button>
								</section>
							</section>
						</section>
						<?php
					}
					?>
				</section>
			</section>
		</section>
		<footer class="footer bg-dark position-absolute bottom-0 w-100">
			<section class="social">
				<a href="#"><i class="fab fa-facebook fa-2x"></i></a>
				<a href="#"><i class="fab fa-twitter fa-2x"></i></a>
				<a href="#"><i class="fab fa-youtube fa-2x"></i></a>
				<a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
			</section>
			<p class="text-light d-inline">Copyright &copy; 2021 - Curtains</p>
		</footer>
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
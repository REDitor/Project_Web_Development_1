<?php
if (isset($_SESSION['user'])) {
	$loggedUser = unserialize($_SESSION['user']);
}
?>

<section id="navbar" class="navbar navbar-expand-xs navbar-expand-sm navbar-dark bg-dark fixed-top">
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
					<li class="nav-item"><a class="nav-link h6" href="shows">Shows</a></li>
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
								<a class="dropdown-item" href="mylists"><i class="fas fa-bars me-2"></i>My Lists</a>
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
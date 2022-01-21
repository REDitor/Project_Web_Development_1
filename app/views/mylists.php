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
	<title>Curtains | My Lists</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="listings.css">
	<link rel="stylesheet" type="text/css" href="mylists.css">
</head>

<body class="bg-white text-dark">


	<?php
	//temporary all lists
	require_once __DIR__ . '/../services/watchlistservice.php';
	$watchListsService = new WatchListService();
	$watchLists = $watchListsService->getAll();
	?>

	<header id="hero" class="hero">
		<?php
		include __DIR__ . '/elements/navbar.php';
		?>
	</header>

	<section id="page-container">
		<section id="movie-container">
			<section class="container">
				<ol class="breadcrumb pt-2">
					<li class="breadcrumb-item">
						<a class="text-decoration-none text-danger" href="home">Home</a>
					</li>
					<li class="breadcrumb-item active">My Lists</li>
				</ol>
				<h2>My Lists</h2>
				<section class="pb-5">
					<table class="table table-hover">
						<thead class="table-dark">
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="watchListsTable"></tbody>
					</table>
				</section>
			</section>
		</section>
		<?php
		include __DIR__ . '/elements/footer.php';
		?>
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
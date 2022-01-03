<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="../../img/favicon/favicon.svg" />
    <title>Curtains | About</title>
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
    </style>
</head>

<!--FIXME: remove whitespace under footer-->
<!--FIXME: imges and css not loading (from seperate files)-->

<body class="bg-white text-dark">
    <header class="hero">
        <section id="navbar" class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <a href="home" class="text-decoration-none">
                <h1 class="logo ms-4 mt-2">
                    <span class="text-danger"><i class="fas fa-video"></i> Cur</span><span class="text-white">tains</span>
                </h1>
            </a>
	        <nav class="w-75">
		        <section class="container">
			        <button class="navbar-toggler" data-toggle="collapse" data-target="#navBurger">
				        <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navBurger">
				        <ul class="navbar-nav m-auto">
					        <li class="nav-item"><a class="nav-link h6" href="home">Home</a></li>
					        <li class="nav-item"><a class="nav-link h6" href="movies">Movies</a></li>
					        <li class="nav-item"><a class="nav-link h6" href="shows">Shows</a></li>
					        <li class="nav-item"><a class="nav-link h6 active" href="about">About</a></li>
					        <li class="nav-item"><a class="nav-link h6" href="contact">Contact</a></li>
				        </ul>
				        <ul class="navbar-nav">
					        <li class="nav-item"><a class="nav-link h6" href="#">Login</a></li>
				        </ul>
			        </div>
		        </section>
	        </nav>
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
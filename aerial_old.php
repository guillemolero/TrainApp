<?php 

session_start();

$user = $_SESSION['user'];


?>

<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Aerial <?php echo $user; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
                <!-- usuarios.php -->
                <link rel="stylesheet" href="innerAssets/css/main.css" />
                
	</head>
	<body class="loading">
            
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1><?php echo $user; ?></h1>
						<nav>
							<ul>
                                                                <li><a href="#" class="icon fa-calendar"><span class="label">Calendario</span></a></li>
								<li><a href="#" class="icon fa-area-chart"><span class="label">Gráficos</span></a></li>
								<li><a href="#" class="icon fa-line-chart"><span class="label">Estadísticas</span></a></li>
							</ul>
						</nav>
					</header>
                               

				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
					</footer>

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; };
			window.ontouchmove = function() { return false; };
			window.onorientationchange = function() { document.body.scrollTop = 0; };
		</script>
               
                
	</body>
</html>
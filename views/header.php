<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Behnana</title>
	<link href='http://fonts.googleapis.com/css?family=Lobster|Alegreya+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container">
			<div class="col-10">
				<h1><a href="index.php">Behnana<a></h1>
			</div>
			<div class="cart col-2">
				<a href="cart.php">
					Cart: <?=Cart::get_total()?>
				</a>
			</div>
		</div>
	</header>
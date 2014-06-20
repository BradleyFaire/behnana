<?php 
	
	$cat = new Category_model(); 
	$categories = $cat->list_categories();

?>

<div class="container">
	<nav>

		<ul class="col-8" id="nav">

			<? foreach($categories as $catname): ?>

			<li><a href="index.php?category_id=<?=$catname['id']?>"><?=$catname['name']?></a>
				<ul class="ease">
				<? $products = new Product_list($catname['id']); ?>

				<? foreach($products->items as $prodname): ?>

					<li><a href="index.php?product_id=<?=$prodname['id']?>"><?=$prodname['name']?></a></li>

				<? endforeach; ?>

				</ul>
			</li>
			<? endforeach; ?>

		</ul>

		<ul class="col-4 login">
			<li><a href="login_page.php">Login</a></li>
			<li><a href="#">Register</a></li>
		</ul>

	</nav>
</div>
<div class="line"></div>
<div class="container">

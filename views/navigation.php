<?php 
	
	$cat = new Category_model(); 
	$categories = $cat->list_categories();

?>

<div class="container">
	<nav>

		<ul class="col-8" id="nav">

			<? foreach($categories as $catname): ?>
			
			<? if($_SESSION['admin_logged_in']): ?>
				<li><a href="add_category.php?category_id=<?=$catname['id']?>"><?=$catname['name']?></a>
					<ul class="ease">
					<? $products = new Product_list($catname['id']); ?>

					<? foreach($products->items as $prodname): ?>

						<li><a href="index.php?product_id=<?=$prodname['id']?>"><?=$prodname['name']?></a></li>

					<? endforeach; ?>
						<li><a class="addthing" href="add_product.php">Add New Product</a></li>

					</ul>
				</li>
			<? else: ?>
				<li><a href="index.php?category_id=<?=$catname['id']?>"><?=$catname['name']?></a>
					<ul class="ease">
					<? $products = new Product_list($catname['id']); ?>

					<? foreach($products->items as $prodname): ?>

						<li><a href="index.php?product_id=<?=$prodname['id']?>"><?=$prodname['name']?></a></li>

					<? endforeach; ?>

					</ul>
				</li>
			<? endif; ?>

			<? endforeach; ?>
			<? if($_SESSION['admin_logged_in']): ?>
				<li><a class="addthing" href="add_category.php">Add New Category</a></li>
			<? endif; ?>

		</ul>


		<? if($_SESSION['admin_logged_in']): ?>

		<ul class="col-4 login">
			<li><a href="logout.php">Logout</a></li>
		</ul>

		<? elseif($_SESSION['customer_logged_in']): ?>

		<ul class="col-4 login">
			<li><a href="logout.php">Logout</a></li>
		</ul>

		<? else: ?>

		<ul class="col-4 login">
			<li><a href="login_page.php">Login</a></li>
			<li><a href="#">Register</a></li>
		</ul>

		<? endif; ?>

	</nav>
</div>
<div class="line"></div>
<div class="container">

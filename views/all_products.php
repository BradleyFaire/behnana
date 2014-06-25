<div class="main col-12">

	<?php

	$test = new Category_model();
	$cat = $test->list_categories();

	
	?>


	<? foreach($cat as $q): ?>

		<h1><?=$q['name']?></h1>

		<? $p = new Product_list($q['id']); ?>

		<!-- shows all the products things on the listy -->
		<? foreach($p->items as $prod): ?>

			<div class="col-product listedproduct">

				<a href="index.php?product_id=<?=$prod['id']?>"><h2><?=$prod['name']?></h2></a>

				<a href="index.php?product_id=<?=$prod['id']?>"><img src="<?=$prod['thumbnail']?>" class="thumbnail" alt=""></a>

				<div class="price">$<?=$prod['price']?> each</div>

				<?=Form::open('add_to_cart.php')?>

					<?=Form::hidden('id', $prod['id'])?>
					<?=Form::number('quantity', '1','min="1"')?>
					<?=Form::submit('Order')?>

				<?=Form::close()?>

			</div>

		<? endforeach; ?>

		<div class="line"></div>

	<? endforeach; ?>

</div>

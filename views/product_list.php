<div class="main col-12">

	<?php

	$p = new Product_list($_GET['category_id']);

	$c = new model('tb_categories');
	$c->load($_GET['category_id']);

	$n = $p->count_items();


	?>

	<h1><?=$c->name?></h1>
	<!-- shows all the products things on the listy -->
	<? foreach($p->items as $prod): ?>
		<div class="col-product listedproduct">

			<a href="index.php?product_id=<?=$prod['id']?>"><h2><?=$prod['name']?></h2></a>
			<a href="index.php?product_id=<?=$prod['id']?>"><img src="<?=$prod['image']?>" class="thumbnail" alt=""></a>
			<div class="price">$<?=$prod['price']?> each</div>

			<?=Form::open('add_to_cart.php')?>
				<?=Form::hidden('id', $prod['id'])?>
				<?=Form::number('quantity', '1','min="1"')?>
				<?=Form::submit('Order')?>
			<?=Form::close()?>
		</div>
	<? endforeach; ?>

</div>
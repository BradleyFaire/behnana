<?php 

$p = new Model('tb_products');
$p->load($_GET['product_id']);

?>

<div class="main col-12">

	<div class="col-12 listedproduct">
		<h2><?=$p->name?></h2>
		<img src="<?=$p->image?>" class="bigimage col-6" alt="">
		<div class="description col-6"><?=$p->description?></div>
		<div class="price pricebig">
			$<?=$p->price?> each
		</div> 
		<?=Form::open('add_to_cart.php')?>
			<?=Form::hidden('id', $p->id)?>
			<div class="col-3">
				<?=Form::number('quantity', '1','min="1" style="width: 100%"')?>
			</div>
			<div class="col-3">
				<?=Form::submit('Order', 'style="width: 100%"')?>
			</div>
		<?=Form::close()?>


		<!-- <form>
			<div class="col-3"><input style="width: 100%" type="number" value="0"></div>
			<div class="col-3"><input style="width: 100%" type="submit"></div>
		</form> -->
	</div>
	
</div>

<div class="main">
	<h2><?=$title?></h2>

	<div class="product">

	<?=Form::open()?>

		<div class="row">
			<?=Form::label('name', 'Name:')?>
			<?=Form::input('text', 'name', $product->name)?>
		</div>

		<div class="row">
			<?=Form::label('description', 'Description:')?>
			<?=Form::textarea('description', $product->description)?>
		</div>

		<div class="row">
			<?=Form::label('price', 'Price:')?>
			<?=Form::number('price', $product->price)?>
		</div>

		<div class="row">
			<?=Form::label('image', 'Image:')?>
			<?=Form::input('text', 'image', $image)?>
		</div>

		<div class="row">
			<?=Form::label('thumbnail', 'Thumbnail:')?>
			<?=Form::input('text', 'thumbnail', $thumbnail)?>
		</div>

		<div class="row">
			
			<? if ($_GET['product_id']): ?>

				<?=Form::submit('Update', 'class="update"')?>

				<a href="../public/delete_product.php?product_id=<?=$_GET['product_id']?>" class="circle"><i class="istyle fa fa-times" style="color: white;"></i></a>

			<? else: ?>
				<?=Form::submit('Create', 'class="create"')?>
			<? endif; ?>
		</div>

		<?=Form::close()?>

	</div>
</div>
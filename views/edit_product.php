<div class="main">
	<h2><?=$title?></h2>

	<div class="product">

	<?=$form->open()?>

		<div class="row">
			<?=$form->label('name', 'Name:')?>
			<?=$form->input('text', 'name', $product->name)?>
		</div>

		<div class="row">
			<?=$form->label('description', 'Description:')?>
			<?=$form->textarea('description', $product->description)?>
		</div>

		<div class="row">
			<?=$form->label('price', 'Price:')?>
			<?=$form->number('price', $product->price)?>
		</div>

		<div class="row">
			<?=$form->label('image', 'Image:')?>
			<?=$form->input('text', 'image', $image)?>
		</div>

		<div class="row">
			<?=$form->label('thumbnail', 'Thumbnail:')?>
			<?=$form->input('text', 'thumbnail', $thumbnail)?>
		</div>

		<div class="row">
			
			<? if ($_GET['product_id']): ?>

				<?=$form->submit('Update', 'class="update"')?>

				<a href="../public/delete_product.php?product_id=<?=$_GET['product_id']?>" class="circle"><i class="istyle fa fa-times" style="color: white;"></i></a>

			<? else: ?>
				<?=$form->submit('Create', 'class="create"')?>
			<? endif; ?>
		</div>

		<?=$form->close()?>

	</div>
</div>
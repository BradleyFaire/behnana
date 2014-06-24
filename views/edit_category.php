<div class="main">
	<h2><?=$title?></h2>

	<?=$form->open()?>

	<div class="row">
		<?=$form->label('name', 'Name:')?>
		<?=$form->input('text', 'name', $category->name)?>
	</div>

	<div class="row">
		
		<? if ($_GET['category_id']): ?>
			<?=$form->submit('Update', 'class="update"')?>
			<a href="../public/delete_category.php?category_id=<?=$_GET['category_id']?>" class="circle"><i class="istyle fa fa-times" style="color: white;"></i></a>
		<? else: ?>
			<?=$form->submit('Create', 'class="create"')?>
		<? endif; ?>
	</div>

	<?=$form->close()?>
</div>
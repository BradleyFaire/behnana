<div class="main">
	<h2><?=$title?></h2>

	<?=Form::open()?>

	<div class="row">
		<?=Form::label('name', 'Name:')?>
		<?=Form::input('text', 'name', $category->name)?>
	</div>

	<div class="row">
		
		<? if ($_GET['category_id']): ?>
			<?=Form::submit('Update', 'class="update"')?>
			<a href="../public/delete_category.php?category_id=<?=$_GET['category_id']?>" class="circle"><i class="istyle fa fa-times" style="color: white;"></i></a>
		<? else: ?>
			<?=Form::submit('Create', 'class="create"')?>
		<? endif; ?>
	</div>

	<?=Form::close()?>
</div>
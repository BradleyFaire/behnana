<h3>Login here:</h3>

<?=Form::open()?>
	
	<div class="row">
		<?=Form::label('email', 'Email:')?>
		<?=Form::input('text', 'email', $_POST['email'])?>
	</div>

	<div class="row">
		<?=Form::label('password', 'Password:')?>
		<?=Form::input('password', 'password', $_POST['password'])?>
	</div>

	<div class="row">
		<?=Form::submit('Login')?>
	</div>

<?=Form::close()?>

<div class="row">
	<a class="register" href="register.php">Register Here</a>
</div>


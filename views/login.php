<div class="login">
	<h2>Login:</h3>

	<?php if($error): ?>
	<p class="error"><?=$error?></p>
	<?php endif; ?>

	<?=Form::open()?>
		
		<div class="row">
			<?=Form::label('username', 'Username:')?>
			<?=Form::input('text', 'username', $_POST['username'])?>
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
		<button class="register" href="register.php">Register</button>
	</div>

</div>
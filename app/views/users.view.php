<?php require 'partials/head.php';?>

<h1>Users Page</h1>

<ul>
	<?php foreach ($users as $user): ?>
		<li>
			<?php echo $user->name . ' ' . $user->surname . ' ' . $user->email; ?>
		</li>
	<?php endforeach;?>
</ul>


<form method="POST" action="/users">
	<input type="text" name="name">Name<br>
	<input type="text" name="surname">Surname<br>
	<input type="text" name="email">Email<br>
	<input type="submit" name="">
</form>


<?php require 'partials/footer.php';?>

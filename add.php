<?php
	require('rb.php');
	R::setup( 'mysql:host=localhost;dbname=Blog','root', 'ka4an' );
	$users =  R::getAll('SELECT * from users');
	if ($_POST['title']) {
		$post = R::dispense('posts');
		$post->title = $_POST['title'];
		$post->body = $_POST['body'];
		$post->user_id = $_POST['userId'];
		$post->likes = 0;
		R::store( $post );
		header('Location: /');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Posts</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form action="add.php" method="POST" class="mt-5">
					<div class="input-group mb-3">
					  <input type="text" name="title" class="form-control" placeholder="Title">
					</div>
					<textarea class="form-control" name="body" placeholder="Body"></textarea>
					<select name="userId">
					<?php 
						foreach ($users as $user) {
							echo "<option value=". $user['id'] . ">". $user['name'] . "</option>";
						}
					 ?>
					</select>
					<button type="submit" name="clicked" class="mt-3 btn btn-large btn-success">Add</button>
				</form>
			</div>
		</div>
	</div>


	
</body>
</html>
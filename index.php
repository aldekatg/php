<?php
	require('rb.php');
	 R::setup('mysql:host=localhost;dbname=Blog','root', 'ka4an');
	 $query = 'SELECT posts.id, posts.title, posts.likes, users.name FROM posts INNER JOIN users ON users.id = posts.user_id';
	 if ($_GET['query']) {
	 	$query = "SELECT posts.id, posts.title, posts.likes, users.name FROM posts INNER JOIN users ON users.id = posts.user_id WHERE posts.title = '". $_GET['query'] . "'";
	 }
	 $data =  R::getAll($query);
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
		<a class="btn btn-large btn-primary mt-5" href="add.php">Add</a>

		<form action="index.php" method="GET">
			<div class="input-group my-3">
				<input type="text" class="form-control" name="query">
				<button type="submit" class="btn">SEARCH</button>
			</div>
		</form>
		<div class="row">
			<?php foreach ($data as $item) { ?>
				<div class="col-4">
					<div class="card my-3">
					  <div class="card-body">
					    <h4 class="card-title"><?= $item['title'] ?></h4>
					    <p class="card-text"><?= $item['name'] ?></p>
					    <?php echo '<a href="posts.php?id='.$item['id'].'" class="btn btn-primary">More ...</a>'; ?>
					  </div>
					</div>
				</div>
			<?php } ?>			
		</div>
	</div>
</body>
</html>
<?php
	require('rb.php');
	 R::setup( 'mysql:host=localhost;dbname=Blog',
        'root', 'ka4an' );

	 $id = $_GET['id'];
	 $query_user = "SELECT * FROM users WHERE id = $id";
	 $query_posts = "SELECT * FROM posts WHERE user_id = $id";
	 $user =  R::getRow($query_user);
	 $posts =  R::getAll($query_posts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container">
		<div class="row my-5">
			<h1><?php echo $user["name"]; ?></h1>
		</div>
		<!-- <?php var_dump($posts) ?> -->
		<hr>
		<div class="row">
			<?php foreach ($posts as $item) { ?>
				<div class="col-4">
					<div class="card my-3">
					  <div class="card-body">
					  	<h4 class="card-title"><?= $item['title'] ?></h4>
					    <p class="card-text"><?= $item['name'] ?></p>
					     <?php echo '<a href="posts.php?id='.$item['id'].'" class="btn btn-primary">Go to this post</a>'; ?>
					  </div>
					</div>
				</div>
			<?php } ?>			
		</div>
	</div>
	
</body>
</html>
<?php
	require('rb.php');
	R::setup( 'mysql:host=localhost;dbname=Blog',
        'root', 'ka4an' );

	$id = $_GET['id'];
	$query__post = "SELECT posts.id, posts.title, posts.body, posts.likes, users.name as username, users.id as user_id 
	 					FROM posts INNER JOIN users ON users.id = posts.user_id WHERE posts.id = $id";
	$query_comments = "SELECT * FROM comments INNER JOIN users ON users.id=comments.user_id WHERE post_id=$id";
	$post = R::getRow($query__post);
	$comments = R::getAll($query_comments);
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
		<div class="row mt-5">
			<h1><?php echo $post["title"]; ?></h1>
			<p><?php echo $post["body"]; ?></p>
			  <hr class="my-2">
		  <?php echo '<a href="users.php?id='.$post['user_id'].'" class="btn btn-primary">'.$post['username'].'</a>'; ?>
		</div>
		<hr>
		<div class="row">

			<h3><i>Comments</i></h3>

			<div class="col-12">
				<?php foreach ($comments as $item) { ?>
				<div class="media">
				  <div class="media-body">
				  	<b class="mt-0"><?= $item["name"] ?></b>
				    :<?= $item["body"]; ?>
				  </div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>
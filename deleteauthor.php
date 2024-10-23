<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Author</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: lightcyan;">
	<h1 style="text-align: center;">Are you sure you want to delete this user?</h1>
	<?php $getAuthorID = getAuthorID($pdo, $_GET['author_id']); ?>
	<div class="container" style="border-style: dotted; text-align:center; padding: 10px;">
		<h2>Author ID: <?php echo $getAuthorID['author_id']; ?></h2>
		<h2>Author Name: <?php echo $getAuthorID['author_name']; ?></h2>
		<h2>Email: <?php echo $getAuthorID['email']; ?></h2>
		<h2>Created At: <?php echo $getAuthorID['created_at']; ?></h2>

		<div class="deleteBtn" style="text-align:center;">
			<form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
				<input type="submit" name="deleteAuthor" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
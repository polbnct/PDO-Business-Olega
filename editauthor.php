<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Newsletter</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: lightsalmon;">
	<?php $getAuthorID = getAuthorID($pdo, $_GET['author_id']); ?>
	<h1 style="text-align: center;">Edit Author Newsletter</h1>
	<form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
		<p style="text-align: center;">
			<label for="author_name">Author Name</label> 
			<input type="text" name="author_name" value="<?php echo $getAuthorID['author_name']; ?>">
		</p>
		<p style="text-align: center;">
			<label for="email">Email</label> 
			<input type="text" name="email" value="<?php echo $getAuthorID['email']; ?>">
		</p>
		<p style="text-align: center;">
			<label for="created_at">Created at</label> 
			<input type="date" name="created_at" value="<?php echo $getAuthorID['created_at']; ?>">
		</p>
		<p style="text-align: center;">
			<input type="submit" name="editAuthors">
		</p>
	</form>
</body>
</html>
<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Author Newsletter Page</title>
</head>
<body style="background-color: lightgreen;">
	<h1 style="text-align: center; font-family: Garamond, serif;">Welcome Author Page Newsletter</h1>
	<form action="core/handleForms.php" method="POST">
		<p style="text-align: center;">
			<label for="author_name">Author Name: </label> 
			<input type="text" name="author_name">
		</p>
		<p style="text-align:center;">
			<label for="email">Author Email: </label> 
			<input type="text" name="email">
		</p>
		<p style="text-align: center;">
			<label for="created_at">Created At: </label> 
			<input type="date" name="created_at">
		</p>
		<p style="text-align: center;">
			<input type="submit" name="insertAuthor">
		</p>
	</form>
	<?php $getAllAuthor = getallAuthor($pdo); ?>
	<?php foreach ($getAllAuthor as $row) { ?>
	<div class="container" style="border-style: dotted; width: 50%; height: 300px; margin-top: 20px;margin: auto; background-color: lightblue;">
		<h3 style="padding: 10px;">Author ID: <?php echo $row['author_id']; ?></h3>
		<h3 style="padding: 10px;">Author Name: <?php echo $row['author_name']; ?></h3>
		<h3 style="padding: 10px;">Email: <?php echo $row['email']; ?></h3>
		<h3 style="padding-top: 10px; padding-left: 10px;">Created At: <?php echo $row['created_at']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px; border-style: solid; padding:10px; ">
			<a href="viewclient.php?author_id=<?php echo $row['author_id']; ?>">View Clients</a>
			<a href="editauthor.php?author_id=<?php echo $row['author_id']; ?>">Edit</a>
			<a href="deleteauthor.php?author_id=<?php echo $row['author_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>
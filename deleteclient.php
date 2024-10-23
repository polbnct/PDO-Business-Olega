<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Client</title>
</head>
<body style="background-color: lightgreen;">
	<?php $getClientId = getClientId($pdo, $_GET['client_id']); ?>
	<h1 style="text-align: center;">Do you want to Delete this Client?</h1>
	<div class="container" style="border: 5px dotted; padding: 10px;">
		<h2 style="text-align: center;">Client Name: <?php echo $getClientId['client_name'] ?></h2>
		<h2 style="text-align: center;">Email Address: <?php echo $getClientId['email_clients'] ?></h2>
		<h2 style="text-align: center;">Author Name: <?php echo $getClientId['author_name'] ?></h2>

		<div class="deleteBtn" style="text-align:center;">
			<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
				<input type="submit" name="deleteClientBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
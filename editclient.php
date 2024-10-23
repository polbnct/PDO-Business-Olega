<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Clients</title>
</head>
<body style="background-color: lightgoldenrodyellow;">
	<a href="viewprojects.php?author_id=<?php echo $_GET['author_id']; ?>">View The Projects</a>
	<h1 style="text-align: center;">Edit the Client Information</h1>
	<?php $getClientId = getClientId($pdo, $_GET['client_id']); ?>
	
	<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>
	&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
		<p style="text-align: center;">
			<label for="firstName">Client Name</label> 
			<input type="text" name="client_name" 
			value="<?php echo $getClientId['client_name']; ?>">
		</p>
		<p style="text-align: center;">
			<label for="firstName">Client Email</label> 
			<input type="text" name="email_clients" 
			value="<?php echo $getClientId['email_clients']; ?>">
		</p>
		<p  style="text-align: center;">
			<input type="submit" name="editClientBtn">
		</p>
	</form>
</body>
</html>
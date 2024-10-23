<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Clients</title>
	<style>
	.table, th, td {
	border: 1px solid;
	text-align: center;
	}
	</style>
</head>
<body style="background-color:lightpink;">
	<a href="index.php">Return Home</a>
	<?php $getAllInfoByNewsletter = getAllInfoByNewsletter($pdo, $_GET['author_id']); ?>
	<h1 style="text-align: center;">Username: <?php echo $getAllInfoByNewsletter['author_name']; ?></h1>
	<h1 style="text-align: center;">Add New Client</h1>
	<form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
		<p style="text-align: center;">
			<label for="firstName">Client Name: </label> 
			<input type="text" name="client_name">
		</p>
		<p style="text-align: center;">
			<label for="firstName">Email: </label> 
			<input type="text" name="email_clients">
		</p>
		<p style="text-align: center;">
			<input type="submit" name="insertNewClientBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;border-collapse: collapse;border: 1px solid; background-color:aqua;">
	  <tr>
	    <th>Client ID</th>
	    <th>Client Name</th>
	    <th>Email</th>
	    <th>Author Name</th>
	    <th>Action</th>
	  </tr>
	  <?php $getClientbyAuthor = getClientbyAuthor($pdo, $_GET['author_id']); ?>
	  <?php foreach ($getClientbyAuthor as $row) { ?>
	  <tr>
	  	<td><?php echo $row['client_id']; ?></td>	  	
	  	<td><?php echo $row['client_name']; ?></td>	  	
	  	<td><?php echo $row['email_clients']; ?></td>	  	
	  	<td><?php echo $row['author_name']; ?></td>	  	
	  	<td>
	  		<a href="editclient.php?client_id=<?php echo $row['client_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>">Edit</a>
	  		<a href="deleteclient.php?client_id=<?php echo $row['client_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>
<?php  


require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertAuthor'])) {

	if (!empty($_POST['author_name']) && !empty($_POST['email']) && !empty($_POST['created_at'])) {

		$query = insertAuthor($pdo, $_POST['author_name'], $_POST['email'], $_POST['created_at']);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Insertion failed";
		}

	}

	else {
		echo "Make sure that no input fields are empty!";
	}

}

if (isset($_POST['editAuthors'])) {

	if (!empty($_POST['author_name']) && !empty($_POST['email']) && !empty($_POST['created_at'] && !empty($_GET['author_id']))) {

		$query = updateAuthor($pdo, $_POST['author_name'], $_POST['email'], 
		$_POST['created_at'], $_GET['author_id']);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Edit failed";
		}

	}

	else {
		echo "Make sure no input fields are empty before updating!";
	}



}

if (isset($_POST['deleteAuthor'])) {
	$query = deleteAuthor($pdo, $_GET['author_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewClientBtn'])) {
	$query = insertNewClient($pdo, $_POST['client_name'], $_POST['email_clients'], $_GET['author_id']);

	if ($query) {
		header("Location: ../viewclient.php?author_id=" .$_GET['author_id']);
	}
	else {
		echo "Insertion failed";
	}
}


if (isset($_POST['editClientBtn'])) {
	$query = updateClient($pdo, $_POST['client_name'], $_POST['email_clients'], $_GET['client_id']);

	if ($query) {
		header("Location: ../viewclient.php?author_id=" .$_GET['author_id']);
	}
	else {
		echo "Update failed";
	}

}

if (isset($_POST['deleteClientBtn'])) {
	$query = deleteClient($pdo, $_GET['client_id']);

	if ($query) {
		header("Location: ../viewclient.php?author_id=" .$_GET['author_id']);
	}
	else {
		echo "Deletion failed";
	}
}

?>
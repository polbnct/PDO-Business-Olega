<?php  

function insertAuthor($pdo, $author_name, $email, $created_at) {

	$sql = "INSERT INTO newsletter_authors (author_name, email, 
		created_at) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$author_name, $email, 
		$created_at]);

	if ($executeQuery) {
		return true;
	}
}

function getallAuthor($pdo) {
	$sql = "SELECT * FROM newsletter_authors";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAuthorID($pdo, $author_id) {
	$sql = "SELECT * FROM newsletter_authors WHERE author_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$author_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateAuthor($pdo, $author_name, 
	$email, $created_at, $author_id) {

	$sql = "UPDATE newsletter_authors
				SET author_name = ?,
					email = ?, 
					created_at = ?
				WHERE author_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$author_name, 
		$email, $created_at, $author_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteAuthor($pdo, $author_id) {
	$deleteAuthor = "DELETE FROM newsletter_authors WHERE author_id = ?";
	$deleteStmt = $pdo->prepare($deleteAuthor);
	$executeDeleteQuery = $deleteStmt->execute([$author_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM newsletter_authors WHERE author_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$author_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getClientId($pdo, $client_id) {
	$sql = "SELECT 
				clients.client_id,
				clients.client_name,
				clients.email_clients,
				clients.created_at AS created_at,
                newsletter_authors.author_name AS author_name
			FROM clients
			JOIN newsletter_authors ON clients.author_id = newsletter_authors.author_id
			WHERE clients.client_id  = ? 
			GROUP BY clients.client_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function insertNewClient($pdo, $client_name, $email_clients, $author_id) {
	$sql = "INSERT INTO clients (client_name, email_clients, author_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_name, $email_clients, $author_id]);
	if ($executeQuery) {
		return true;
	}

}

function updateClient($pdo, $client_name, $email_client, $client_id) {
	$sql = "UPDATE clients
			SET client_name = ?,
				email_clients = ?
			WHERE client_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_name, $email_client, $client_id]);

	if ($executeQuery) {
		return true;
	}
}


function getClientbyAuthor($pdo, $author_id) {
	$sql = "SELECT 
				clients.client_id AS client_id,
				clients.client_name AS client_name,
				clients.email_clients AS email_clients,
                newsletter_authors.author_name AS author_name,
				clients.created_at AS created_at
			FROM clients
			JOIN newsletter_authors ON clients.author_id = newsletter_authors.author_id
			WHERE newsletter_authors.author_id = ? 
			GROUP BY clients.client_name;";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$author_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function deleteClient($pdo, $client_id) {
	$sql = "DELETE FROM clients WHERE client_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_id]);
	if ($executeQuery) {
		return true;
	}
}

function getAllInfoByNewsletter($pdo, $author_id) {
	$sql = "SELECT * FROM newsletter_authors WHERE author_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$author_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

?>
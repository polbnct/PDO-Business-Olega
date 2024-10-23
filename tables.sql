-- Create the newsletter_authors table
CREATE TABLE newsletter_authors (
    author_id INT AUTO_INCREMENT PRIMARY KEY,  -- Primary key for authors
    author_name VARCHAR(100) NOT NULL,          -- Name of the author
    email VARCHAR(100) NOT NULL UNIQUE,         -- Email address (must be unique)
    created_at DATETIME NOT NULL
);

-- Create the clients table
CREATE TABLE clients (
    client_id INT AUTO_INCREMENT PRIMARY KEY,   -- Primary key for clients
    client_name VARCHAR(100) NOT NULL,          -- Name of the client
    email_clients VARCHAR(100) NOT NULL UNIQUE,         -- Email address (must be unique)
    author_id INT,                              -- Foreign key for the author
    created_at DATETIME NOT NULL,
    FOREIGN KEY (author_id) REFERENCES newsletter_authors(author_id)
        ON DELETE CASCADE                        -- Delete clients if the author is deleted
);
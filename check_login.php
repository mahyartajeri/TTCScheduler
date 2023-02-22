<?php

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check if the username and password match


try {
    $sql = "SELECT * FROM logins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
  }
  
  //catch exception
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }





// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
	// Login successful, redirect to the main page
	header("Location: log.php");
	exit();
} else {
	// Login failed, show an error message
	echo "Invalid username or password.";
}

// Close the database connection
mysqli_close($conn);

?>

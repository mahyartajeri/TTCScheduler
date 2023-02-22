<?php
$host = "localhost"; // Replace with the IP address of your database server
$username = "root";
$password = "";
$database = "test";

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date=$_POST["eventDate"];

// Insert the data into the database
$sql="INSERT INTO supervisors (name, phone_number,date) VALUES ('$name','$phone','$date');";


try {
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
    }
  }
  
  //catch exception
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }
// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// // Close the database connection
// mysqli_close($conn);
?>

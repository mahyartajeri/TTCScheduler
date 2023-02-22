<?php
$q = $_GET["q"];

// TODO: Execute a SQL query to search for matching records



$host = "localhost"; // or your host name
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $q;
// Retrieve the row that matches the name
$sql = "SELECT * FROM supervisors WHERE name = '$name'";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
    </tr>";
    while($row=$result->fetch_assoc()){
    // Create an HTML table to display the data
   
    // Output data of the first row
 
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["phone_number"] . "</td>";
    echo "</tr>";
    
} 
echo "</table>";
} else {
    echo "No results found for name: " . $name;
}


// Close database connection
mysqli_close($conn);

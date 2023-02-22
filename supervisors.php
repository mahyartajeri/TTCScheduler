<?php
// Connect to MySQL database
$host = "localhost"; // or your host name
$username = "root";
$password = "";
$dbname = "TTCSupervisorSchedule";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the supervisors table
$sql = "SELECT * FROM supervisors";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Create an HTML table to display the data
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
            </tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close database connection
mysqli_close($conn);

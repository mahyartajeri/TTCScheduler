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

// Retrieve data from the routes table, along with the position number and supervisor name
$sql = "SELECT routes.id, routes.number, routes.name
        FROM routes;";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Create an HTML table to display the data
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Name</th>
                <th>Position Number</th>
                <th>Supervisor Name</th>
            </tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["number"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["position_number"] . "</td>";
        echo "<td>" . $row["supervisor_name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close database connection
mysqli_close($conn);

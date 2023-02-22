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

// Retrieve data from the positions table, along with the supervisor and pod names
$sql = "SELECT positions.id, pods.name as pod_name
        FROM positions
        INNER JOIN pods ON positions.pod_id = pods.id;";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Create an HTML table to display the data
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Pod</th>
            </tr>";
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["pod_name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close database connection
mysqli_close($conn);

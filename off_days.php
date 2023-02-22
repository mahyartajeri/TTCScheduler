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

// Retrieve data from the off_days table, along with the supervisor name
$sql = "SELECT off_days.id, off_days.day, supervisors.name as supervisor_name
        FROM off_days
        INNER JOIN supervisors ON off_days.supervisor_id = supervisors.id";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Create an HTML table to display the data
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>Supervisor Name</th>
            </tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["day"] . "</td>";
        echo "<td>" . $row["supervisor_name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close database connection
mysqli_close($conn);

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: larger;
        }
    </style>
</head>

<body>
    <?php
    // Connect to the database
    $mysqli = new mysqli('localhost', 'root', '', 'TTCSupervisorSchedule');

    // Check for errors
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Query the database
    $query = "
    SELECT po.name AS pod_name, p.id AS position_id, GROUP_CONCAT(CONCAT_WS(': ', r.number, r.name) SEPARATOR ', ') AS routes
    FROM pods po
    JOIN positions p ON po.id = p.pod_id
    JOIN routes r ON p.id = r.position_id
    GROUP BY po.name, p.id
    ORDER BY po.name, p.id
";
    try {
        $result = $mysqli->query($query);
    } catch (Exception $e) {
        echo "Message: " . $e->getMessage();
    }

    // Build the HTML table
    echo '<table><tr><th>Pod Name</th><th>Position #</th><th>Routes</th></tr>';
    $current_pod = null;
    $current_position = null;
    while ($row = $result->fetch_assoc()) {
        // Query for name 
        $innerQuery = "
        SELECT supervisors.name AS name 
        FROM occupations
        INNER JOIN supervisors ON occupations.supervisor_id = supervisors.id
        WHERE occupations.position_id = '$row[position_id]'
        ";
        try {
            $innerResult = $mysqli->query($innerQuery);
        } catch (Exception $e) {
            echo "Message: " . $e->getMessage();
        }
        $innerRow = array("name" => "N/A");
        if ($innerResult->num_rows >= 1) {
            $innerRow = $innerResult->fetch_assoc();
        }
        // Start a new row for each pod
        if ($current_pod != $row['pod_name']) {
            echo '<tr><td><strong>' . $row['pod_name'] . '</strong></td><td colspan="2"></td></tr>';
            $current_pod = $row['pod_name'];
            $current_position = null;
        }

        // Display the position and routes in the same row
        echo '<tr><td>' . $innerRow['name'] . '</td><td>' . $row['position_id'] . '</td><td>' . $row['routes'] . '</td></tr>';
    }
    echo '</table>';

    // Free the result set and close the database connection
    $result->free();
    $mysqli->close();
    ?>
</body>

</html>
<?php

include("dbconnection.php");

$sql = "SELECT customer_id, firstname, lastname, email FROM customer_credentials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["customer_id"] . "</td>
                <td>" . $row["firstname"] . " " . $row["lastname"] . "</td> 
                <td>" . $row["email"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
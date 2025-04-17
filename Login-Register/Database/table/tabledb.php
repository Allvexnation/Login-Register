<?php
require __DIR__ . '/../db_connection.php';

$sql = "SELECT email, phone, username, password FROM signup";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($results) > 0) {
    foreach ($results as $row) {
        echo "<tr>
                <td><input type='checkbox' class='row-select' data-email='" . htmlspecialchars($row["email"]) . "'></td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["phone"]) . "</td>
                <td>" . htmlspecialchars($row["username"]) . "</td>
                <td>" . htmlspecialchars($row["password"]) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}

$conn = null;
?>
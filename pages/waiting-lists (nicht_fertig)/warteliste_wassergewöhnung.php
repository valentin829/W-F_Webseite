<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schwimmkurse_wartelisten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['kurs'])) {

    $sql = "SELECT * FROM warteliste_wassergewöhnung";
    $result = $conn->query($sql);

    echo "<h2>Warteliste $selectedCourse</h2>";
    echo "<table border='1'>
            <tr>
                <th>Name</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Kurs nicht ausgewählt.";
}

$conn->close();
?>

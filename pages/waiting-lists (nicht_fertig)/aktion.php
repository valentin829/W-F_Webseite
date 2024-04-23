<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schwimmwebseite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['action']) && isset($_GET['id']) && isset($_GET['kurs'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    $selectedCourse = $_GET['kurs'];

    if ($action == 'akzeptieren') {
        $sqlUpdate = "INSERT INTO $selectedCourse SELECT * FROM warteliste_$selectedCourse WHERE id=$id";
        $sqlDelete = "DELETE FROM warteliste_$selectedCourse WHERE id=$id";
    } elseif ($action == 'ablehnen') {
        $sqlDelete = "DELETE FROM warteliste_$selectedCourse WHERE id=$id";
    }

    $conn->query($sqlUpdate);
    $conn->query($sqlDelete);

    $conn->close();

    header("Location: warteliste.php?kurs=$selectedCourse");
} else {
    echo "Ungültige Aktion.";
}
?>

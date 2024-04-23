<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bronzekurs Übersicht</title>
    <style>
        body {
            font-family: Arial;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 10px;
        }

        input[type="submit"] {
            margin-top: 10px;
            height: 25px;
        }
    </style>
</head>

<body>
    <h1>Bronzekurs</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmwebseite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM bronzekurs_warteliste";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form method='POST' id='participantForm'>";
        echo "<table>
                <tr>
                    <th>Teilnehmer-ID</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>15 Min. Schwimmen</th>
                    <th>1x Tieftauchen</th>
                    <th>1m-Paketsprung</th>
                    <th>Baderegeln</th>
                    <th>Brust</th>
                </tr>";

        // Daten aus der Datenbank in die Tabelle einfügen
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-participant-id='{$row['TeilnehmerID']}'>
            <td>{$row['TeilnehmerID']}</td>
            <td>{$row['kind_vorname']}</td>
            <td>{$row['kind_nachname']}</td>
            <td><input type='checkbox' name='15min_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_15min_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
            <td><input type='checkbox' name='tieftauchen_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_tieftauchen_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
            <td><input type='checkbox' name='paketsprung_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_paketsprung_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
            <td><input type='checkbox' name='baderegeln_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_baderegeln_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
            <td><input type='checkbox' name='brust_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_brust_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
          </tr>";
    
        }

        echo "</table>";
        echo "<input type='submit' name='submitForm' value='Teilnehmer überprüfen und löschen'>";
        echo "</form>";

        if (isset($_POST['submitForm'])) {
            $result = $conn->query($sql);
            checkAndDeleteParticipants($result, $conn);
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    function checkAndDeleteParticipants($result, $conn) {
        while ($row = $result->fetch_assoc()) {
            $participantId = $row['TeilnehmerID'];
            $requirements = ['15min', 'tieftauchen', 'paketsprung', 'baderegeln', 'brust'];
            $completed = true;

            foreach ($requirements as $requirement) {
                $checkboxName = "{$requirement}_{$participantId}";
                $dateName = "date_{$requirement}_{$participantId}";

                if (!isset($_POST[$checkboxName]) || !isset($_POST[$dateName])) {
                    $completed = false;
                    break;
                }
            }

            if ($completed) {
                // Lösche den Teilnehmer aus der bronzekurs-Tabelle
                $deleteSql = "DELETE FROM bronzekurs_warteliste WHERE TeilnehmerID = ?";
                $stmt = $conn->prepare($deleteSql);
                $stmt->bind_param("i", $participantId);
                $deleteResult = $stmt->execute();
                $stmt->close();

                if ($deleteResult) {
                    // Fügt einen Vermerk in die mitglieder_db-Tabelle ein
		            $updateSql = "UPDATE mitglieder_db SET Historie = CONCAT(Historie, '\n<hr> Bronzekurs - abge. " . date('d.m.Y') . "<br> <hr>') WHERE Vorname = ? AND Nachname = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("ss", $row['Vorname'], $row['Nachname']);
                    $updateResult = $stmt->execute();
                    $stmt->close();

                    if ($updateResult) {
                        echo "<p>Teilnehmer {$row['Vorname']} {$row['Nachname']} hat den Kurs abgeschlossen.</p>";
                    } else {
                        echo "<p>Fehler beim Aktualisieren der mitglieder_db-Tabelle für Teilnehmer {$row['Vorname']} {$row['Nachname']}.</p>";
                    }
                } else {
                    echo "<p>Fehler beim Löschen des Teilnehmers $participantId aus der bronzekurs-Tabelle.</p>";
                }
            }
        }
    }
    ?>
    
    <script>
    // JavaScript zum Speichern der Checkbox-Status im Local Storage
    const checkboxes = document.querySelectorAll('[type="checkbox"]');
    const dates = document.querySelectorAll('[type="date"]');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const participantId = checkbox.dataset.participantId;
            localStorage.setItem(`child-${participantId}-checked`, checkbox.checked);
        });

        // Wiederherstellen des Status aus dem Local Storage
        const participantId = checkbox.dataset.participantId;
        const isChecked = localStorage.getItem(`child-${participantId}-checked`);
        if (isChecked) {
            checkbox.checked = (isChecked === 'true');
        }
    });

    dates.forEach((date) => {
        date.addEventListener('input', () => {
            const participantId = date.dataset.participantId;
            localStorage.setItem(`child-${participantId}-date`, date.value);
        });

        // Wiederherstellen des Datums aus dem Local Storage
        const participantId = date.dataset.participantId;
        const savedDate = localStorage.getItem(`child-${participantId}-date`);
        if (savedDate) {
            date.value = savedDate;
        }
    });
</script>


</body>

</html>

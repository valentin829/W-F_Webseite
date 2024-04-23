<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Goldkurs Übersicht</title>
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
    </style>
</head>

<body>
    <h1>Goldkurs</h1>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmwebseite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL-Abfrage, um Kinderdaten abzurufen
    $sql = "SELECT * FROM goldkurs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form method='POST' id='participantForm'>";
        echo "<table>
                <tr>
                    <th>Teilnehmer-ID</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>30 Min. Schwimmen</th>
                    <th>50m Brust in 75 sec</th>
                    <th>25m Kraul</th>
                    <th>50m Rücken</th>
                    <th>2x Tieftauchen</th>
                    <th>10m Weit tauchen aus Schwimmlage</th>
                    <th>50m Transportschwimmen</th>
                    <th>3m Sprung o. 2x 1m Sprung</th>
                    <th>Baderegeln</th>
                    <th>Selbst-/Fremdrettung</th>
                </tr>";

        // Daten aus der Datenbank in die Tabelle einfügen
        while ($row = $result->fetch_assoc()) {
            echo "<tr data-participant-id='{$row['TeilnehmerID']}'>
                    <td>{$row['TeilnehmerID']}</td>
                    <td>{$row['Vorname']}</td>
                    <td>{$row['Nachname']}</td>
                    <td><input type='checkbox' name='30min_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_30min_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='brust_75sec_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_brust_75sec_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='25m_kraul_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_25m_kraul_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='50m_ruecken_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_50m_ruecken_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='tieftauchen_2x_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_tieftauchen_2x_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='weit_tauchen_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_weit_tauchen_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='transportschwimmen_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_transportschwimmen_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='3m_sprung_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_3m_sprung_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='baderegeln_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_baderegeln_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                    <td><input type='checkbox' name='rettung_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'><input type='date' name='date_rettung_{$row['TeilnehmerID']}' data-participant-id='{$row['TeilnehmerID']}'></td>
                  </tr>";
        }

        echo "</table>";
        echo "<input type='button' value='Teilnehmer überprüfen und löschen' onclick='checkAndSubmitForm()'>";
        echo "</form>";

        // Überprüfen und Löschen der abgeschlossenen Teilnehmer nach Button-Klick
        ?>
        <script>
            function checkAndSubmitForm() {
                const checkboxes = document.querySelectorAll('[type="checkbox"]');
                checkboxes.forEach((checkbox) => {
                    const participantId = checkbox.dataset.participantId;
                    const hiddenCheckbox = document.createElement('input');
                    hiddenCheckbox.type = 'hidden';
                    hiddenCheckbox.name = `hiddenCheckbox_${participantId}`;
                    hiddenCheckbox.value = checkbox.checked ? 1 : 0;
                    document.getElementById('participantForm').appendChild(hiddenCheckbox);
                });

                // Führe dann das eigentliche Submit aus
                document.getElementById('participantForm').submit();
            }
        </script>
        <?php
        // Überprüfen und Löschen der abgeschlossenen Teilnehmer nach Formular-Submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $conn->query($sql);
            checkAndDeleteParticipants($result, $conn);
        }
    } else {
        echo "0 results";
    }

    // Verbindung schließen
    $conn->close();

    function checkAndDeleteParticipants($result, $conn) {
        while ($row = $result->fetch_assoc()) {
            $participantId = $row['TeilnehmerID'];
            $requirements = ['30min', 'brust_75sec', '25m_kraul', '50m_ruecken', 'tieftauchen_2x', 'weit_tauchen', 'transportschwimmen', '3m_sprung', 'baderegeln', 'rettung'];
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
                // Löscht den Teilnehmer aus der goldkurs-Tabelle
                $deleteSql = "DELETE FROM goldkurs WHERE TeilnehmerID = ?";
                $stmt = $conn->prepare($deleteSql);
                $stmt->bind_param("i", $participantId);
                $deleteResult = $stmt->execute();
                $stmt->close();

                if ($deleteResult) {
                    // Fügt einen Vermerk in die mitglieder_db-Tabelle ein
                    $updateSql = "UPDATE mitglieder_db SET Historie = CONCAT(Historie, '\n<hr> Goldkurs - abge. " . date('d.m.Y') . "<br>') WHERE Vorname = ? AND Nachname = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("ss", $row['Vorname'], $row['Nachname']);
                    $updateResult = $stmt->execute();
                    $stmt->close();

                    if ($updateResult) {
                        echo "<p>Teilnehmer {$row['Vorname']} {$row['Nachname']} hat den Goldkurs abgeschlossen.</p>";
                    } else {
                        echo "<p>Fehler beim Aktualisieren der mitglieder_db-Tabelle für Teilnehmer {$row['Vorname']} {$row['Nachname']}.</p>";
                    }
                } else {
                    echo "<p>Fehler beim Löschen des Teilnehmers $participantId aus der goldkurs-Tabelle.</p>";
                }
            }
        }
    }
    ?>
</body>

</html>

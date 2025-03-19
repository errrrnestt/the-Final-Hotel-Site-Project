<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ====== Meta Information ====== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS and JavaScript resources -->
    <link rel="stylesheet" href="css/buchung_list.css">
    <script src="jquery/jquery.min.js"></script>
    <title>Kunden Liste</title>
</head>

<body>
    <!-- ====== Database Connection ====== -->
    <?php include "db_connection.php"; // Include database connection ?>

    <!-- ====== Header Section ====== -->
    <header class="header">
        <!-- Logo container -->
        <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>

        <!-- Main navigation menu -->
        <nav>
            <ul>
                <li><a href="hotel_home.php">Home</a></li>
                <li><a href="zimmer_list.php">Zimmern</a></li>
                <li><a href="buchung_list.php">Buchungen</a></li>
            </ul>
        </nav>
    </header>

    <!-- ====== Booking Deletion Handler ====== -->
    <?php 
    // Check if a delete request was sent via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buchung_id'])) {
        $buchung_id = intval($_POST['buchung_id']); // Convert to integer to prevent SQL injection

        // Prepare delete query with parameter binding for security
        $sql_delete = "DELETE FROM buchungen WHERE Buchungs_ID = ?";
        $stmt = $conn->prepare($sql_delete);
        $stmt->bind_param("i", $buchung_id);

        // Execute the deletion and display appropriate message
        if ($stmt->execute()) {
            echo "<h3 class='B_ID'>Eine Buchung mit ID $buchung_id wurde erfolgreich gelöscht! </h3>";
        } else {
            echo "<h3 class='B_ID'>Fehler beim Löschen der Reservierung:</h3> " . $conn->error;
        }
    }
    ?>

    <!-- ====== Navigation Controls ====== -->
    <div id="battons">
        <!-- Back button container -->
        <div id="btnGoBack"><button id="goback">Zurück</button></div>
        <!-- Back button functionality -->
        <script>
            $(document).ready(function() {
                $('#goback').click(function() {
                    window.history.back();
                });
            });
        </script>
    </div>

    <!-- ====== Page Title ====== -->
    <h2>- Buchungen -</h2>

    <!-- ====== Bookings Table ====== -->
    <table class="table">
        <!-- Table header row -->
        <tr id="erst">
            <td>Zimmer</td>
            <td>Kategorien</td>
            <td>Kunden</td>
            <td>Von</td>
            <td>Bis</td>
            <td>Preis</td>
            <td>Status</td>
            <td>Löschen</td>
        </tr>

        <?php
        // ====== SQL Query for Bookings Data ======
        // Get bookings with room info, customer names, and calculate booking status
        $sql = "SELECT z.Zimmer_Nummer, z.Zimmerkategorien, k.Vorname, b.Buchungs_ID, b.Startdatum, b.Enddatum, z.Preis_pro_Nacht, 
                CASE 
                    WHEN CURDATE() BETWEEN b.Startdatum AND b.Enddatum THEN 'Aktiv'
                    WHEN CURDATE() < b.Startdatum THEN 'Zukünftig'
                    ELSE 'Abgeschlossen'
                END AS Status
                FROM buchungen b
                JOIN zimmer z ON b.Zimmer_Nummer = z.Zimmer_Nummer
                JOIN kunden k ON b.Kunden_ID = k.Kunden_ID";

        // Execute the query
        $result = $conn->query($sql);

        // ====== Display Bookings Data ======
        // Create table rows for each booking
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Create row with booking status attribute
                echo '<tr buchung-status="'.$row["Status"]. '">';
                echo "<td>" . $row["Zimmer_Nummer"] . "</td>";
                echo "<td>" . $row["Zimmerkategorien"] . "</td>";
                echo "<td>" . $row["Vorname"] . "</td>";
                echo "<td>" . $row["Startdatum"] . "</td>";
                echo "<td>" . $row["Enddatum"] . "</td>";
                echo "<td>" . $row["Preis_pro_Nacht"] . "€</td>";
                echo "<td>" . $row["Status"] . "</td>";
                // Delete button with form submission
                echo '<td>
                        <form method="post" action="buchung_list.php">
                            <button id="custom-button" name="buchung_id" value="'.$row['Buchungs_ID'].'">X</button>
                        </form>
                      </td>';
                echo "</tr>";
            }
        } else {
            // No bookings found message
            echo "<tr><td colspan='8'>Keine Buchungen gefunden</td></tr>";
        }
        ?>
    </table>

</body>

</html>

<!-- ====== Close Database Connection ====== -->
<?php $conn->close(); // Close database connection ?>
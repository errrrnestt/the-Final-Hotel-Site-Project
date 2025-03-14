<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buchung_list.css">
    <script src="jquery/jquery.min.js"></script>
    <title>Kunden Liste</title>
</head>

<body>

    <?php include "db_connection.php"; ?>

    <div class="header">
        <header>
            <div id="logo"><img src="Photos/logo.PNG" alt="Logo"></div>
            <nav>
                <ul>
                    <li><a href="hotel_home.php">Home</a></li>
                    <li><a href="zimmer_list.php">Zimmern</a></li>
                    <li><a href="buchung_list.php">Buchungen</a></li>
                </ul>
            </nav>
        </header>

    </div>


    <div id="battons">
        <div id="btnGoBack"><button id="goback">Zurück</button></div>
        <script>
        $(document).ready(function() {
            $('#goback').click(function() {
                window.history.back();
            });
        });
        </script>
    </div>


    <h2>- Buchungen -</h2>


    <table class="table">
        <tr id="erst">
            <td>
                Zimmer
            </td>
            <td>
                Kategorien
            </td>
            <td>
                Kunden
            </td>
            <td>
                von
            </td>
            <td>
                bis
            </td>
            <td>
                Preis
            </td>
            <td>
                Status
            </td>
        </tr>

        <?php
    

        $sql = "SELECT b.Buchungs_ID, z.Zimmerkategorien, k.Vorname, b.Startdatum, b.Enddatum, z.Preis_pro_Nacht, 
                CASE 
                WHEN CURDATE() BETWEEN b.Startdatum AND b.Enddatum THEN 'Aktiv'
                WHEN CURDATE() < b.Startdatum THEN 'Zukünftig'
                ELSE 'Abgeschlossen'
                END AS Status
                FROM buchungen b
                JOIN zimmer z ON b.Zimmer_Nummer = z.Zimmer_Nummer
                JOIN kunden k ON b.Kunden_ID = k.Kunden_ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Buchungs_ID"] . "</td>";
                echo "<td>" . $row["Zimmerkategorien"] . "</td>";
                echo "<td>" . $row["Vorname"] . "</td>";
                echo "<td>" . $row["Startdatum"] . "</td>";
                echo "<td>" . $row["Enddatum"] . "</td>";
                echo "<td>" . $row["Preis_pro_Nacht"] . "€</td>";
                echo "<td>" . $row["Status"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Keine Buchungen gefunden</td></tr>";
        }


        ?>
    </table>




</body>

</html>
<?php $conn->close(); ?>
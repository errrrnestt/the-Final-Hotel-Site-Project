<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/zimmer_list.css">
    <script src="js/jquery.min.js"></script>
    <script defer src="js/filter_buttons.js"></script>
    <title>Document</title>
</head>

<body>

    <?php include "db_connection.php"; ?>

    <header class="header">

        <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>

        <nav>
            <ul>
                <li><a href="hotel_home.php">Home</a></li>
                <li><a href="zimmer_list.php">Zimmern</a></li>
                <li><a href="buchung_list.php">Buchungen</a></li>
            </ul>
        </nav>

    </header>






    <div class="filters">

        <span> Filters:

            <button class="filter-btn" onclick="allRoom()">alle</button>

            <button class="filter-btn1" onclick="oneRoom()">Einzehl</button>

            <button class="filter-btn2" onclick="doubleRoom()">Doppelt</button>

            <button class="filter-btn3" onclick="suiteRoom()">Suit</button>

        </span>

    </div>



    <div id="battons">

        <div id="btnGoBack">
            <button id="goback">Zurück</button>  <!-- Убрал скрипты в отдельный файл -->
        </div>

    </div>

    <h2>
        - Zimmer Galerie -
    </h2>

    <table class="tabelle">

        <tr>

            <?php 

                $sql = 
                '   SELECT 
                        z.Zimmer_Nummer,
                        z.Zimmertyp,
                        z.Preis_pro_Nacht,
                        CASE
                            WHEN b.Startdatum IS NULL OR b.Enddatum IS NULL THEN "Verfügbar"
                            WHEN CURDATE() < b.Startdatum OR CURDATE() > b.Enddatum THEN "Verfügbar"
                            ELSE "Belegt"
                        END AS room_status
                    FROM zimmer z
                    LEFT JOIN buchungen b 
                    ON z.Zimmer_Nummer = b.Zimmer_Nummer
                    AND CURDATE() BETWEEN b.Startdatum AND b.Enddatum
                ';


                $result = $conn->query($sql);

                if (!$result) {
                    die("Fehler bei der Abfrage: " . $conn->error);
                }

                $num = 0;

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {

                        echo '<td class="room ' .$row["Zimmertyp"].'" data-rooms="'.($num + 1).'" room-status="'.$row["room_status"]. '" >';
                        echo '<a href=zimmer_info.php?data-rooms='.($num + 1).'> <img src="Photos/zimmer'.($num + 1).'-1.jpg" alt="">';

                        $num = ($num + 1);

                        echo ' <div class="einzehl room_info" > №:'

                        .$row["Zimmer_Nummer"]. " <br> Heute ist " 
                        .$row["room_status"]. " <br>  " 
                        .$row["Zimmertyp"]. " <br> Preis " 
                        .$row["Preis_pro_Nacht"]."€ pro Nacht ";   

                        echo "</div>";
                        echo "</a>";
                        echo "</td>";

                    }

                } else {
                    echo "Keine Ergebnisse gefunden";
                }
            ?>

        </tr>

    </table>
  
</body>
</html>

<?php $conn->close(); ?>
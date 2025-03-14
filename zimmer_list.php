<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/zimmer_list.css">
    <script src="jquery/jquery.min.js"></script>
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
        <div id="btnGoBack"><button id="goback">Zurück</button></div>
        <script>
        $(document).ready(function() {
            $('#goback').click(function() {
                window.history.back();
            });
        });

        function allRoom() {
            $('.room').css("display", "inline-block");
            $('.room').css("display", "inline-block");
        }

        function oneRoom() {
            $('.room').css("display", "none");
            $('.Einzelzimmer').css("display", "inline-block");
        }

        function doubleRoom() {
            $('.room').css("display", "none");
            $('.Doppelzimmer').css("display", "inline-block");
        }

        function suiteRoom() {
            $('.room').css("display", "none");
            $('.Suite').css("display", "inline-block");
        }

        $(document).ready(function() {
            $('#goback').click(function() {
                window.history.back();
            });
        });
        </script>
    </div>

    <h2>
        - Zimmer Galerie -
    </h2>

    <table class="tabelle">
        <tr>
            <?php 
                    $sql = "
                    SELECT 
                        z.Zimmer_Nummer,
                        z.Zimmerkategorien,
                        z.Preis_pro_Nacht,
                        CASE
                            WHEN b.Startdatum IS NULL OR b.Enddatum IS NULL THEN 'verfügbar'
                            WHEN CURDATE() < b.Startdatum OR CURDATE() > b.Enddatum THEN 'verfügbar'
                            ELSE 'belegt'
                        END AS room_status
                    FROM 
                        zimmer z
                    LEFT JOIN 
                        buchungen b ON z.Zimmer_Nummer = b.Zimmer_Nummer
                        AND CURDATE() BETWEEN b.Startdatum AND b.Enddatum
                    ";


            $result = $conn->query($sql);

            if (!$result) {
                die("Fehler bei der Abfrage: " . $conn->error);
            }

                $num = 0;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<td class="room ' .$row["Zimmerkategorien"].'" data-rooms="'.($num + 1).'" room-status="'.$row["room_status"]. '" >';
                        echo '<a href=zimmer_info.php?data-rooms='.($num + 1).'> <img src="Photos/zimmer'.($num + 1).'-1.jpg" alt="">';
                        $num = ($num + 1);
                        echo ' <div class="einzehl room_info" > №:'
                        .$row["Zimmer_Nummer"]. " <br> Heute ist " 
                        .$row["room_status"]. " <br>  " 
                        .$row["Zimmerkategorien"]. " <br> Preis " 
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


    <?php $conn->close(); ?>
</body>

</html>
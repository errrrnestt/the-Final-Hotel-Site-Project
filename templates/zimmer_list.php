<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ====== Meta Information ====== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS and JavaScript resources -->
    <link rel="stylesheet" href="css/zimmer_list.css">
    <script src="jquery/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- ====== Database Connection ====== -->
    <?php include "db_connection.php"; ?>

    <!-- ====== Header Section ====== -->
    <header class="header">
        <!-- Logo container -->
        <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>

        <!-- Main navigation -->
        <nav>
            <ul>
                <li><a href="hotel_home.php">Home</a></li>
                <li><a href="zimmer_list.php">Zimmern</a></li>
                <li><a href="buchung_list.php">Buchungen</a></li>
            </ul>
        </nav>
    </header>

    <!-- ====== Control Panel Section ====== -->
    <div id="battons">
        <!-- Back button -->
        <div id="btnGoBack" class="left_batton"><button id="goback">Zurück</button></div>
        
        <!-- ====== JavaScript Functions ====== -->
        <script>
        // Back button functionality
        $(document).ready(function() {
            $('#goback').click(function() {
                window.history.back();
            });
        });

        // Room filtering functions
        // Show all rooms
        function allRoom() {
            $('.room').css("display", "inline-block");
            $('.room').css("display", "inline-block");
        }

        // Show only single rooms
        function oneRoom() {
            $('.room').css("display", "none");
            $('.Einzelzimmer').css("display", "inline-block");
        }

        // Show only double rooms
        function doubleRoom() {
            $('.room').css("display", "none");
            $('.Doppelzimmer').css("display", "inline-block");
        }

        // Show only suites
        function suiteRoom() {
            $('.room').css("display", "none");
            $('.Suite').css("display", "inline-block");
        }

        // Duplicate back button functionality (consider removing)
        $(document).ready(function() {
            $('#goback').click(function() {
                window.history.back();
            });
        });
        </script>

        <!-- ====== Filter Controls ====== -->
        <div class="filters" >
            <span> Filters:
                <!-- Filter buttons -->
                <button class="filter-btn" onclick="allRoom()">alle</button>
                <button class="filter-btn" onclick="oneRoom()">Einzehl</button>
                <button class="filter-btn" onclick="doubleRoom()">Doppelt</button>
                <button class="filter-btn" onclick="suiteRoom()">Suit</button>
            </span>
        </div>
    </div>

    <!-- ====== Page Title ====== -->
    <h2>
        - Zimmer Galerie -
    </h2>

    <!-- ====== Room Gallery Table ====== -->
    <table class="tabelle">
        <tr>
            <?php 
                // ====== SQL Query for Room Data ====== 
                // Query to fetch room information with availability status
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

                // Execute the query
                $result = $conn->query($sql);

                // Check for query errors
                if (!$result) {
                    die("Fehler bei der Abfrage: " . $conn->error);
                }

                // ====== Room Display Logic ======
                $num = 0;
                if ($result->num_rows > 0) {
                    // Loop through room data
                    while($row = $result->fetch_assoc()) {
                        // Create room cell with appropriate classes and attributes
                        echo '<td class="room ' .$row["Zimmerkategorien"].'" data-rooms="'.($num + 1).'" room-status="'.$row["room_status"]. '" >';
                        // Room image with link to details page
                        echo '<a href=zimmer_info.php?data-rooms='.($num + 1).'> <img src="Photos/zimmer'.($num + 1).'-1.jpg" alt="">';
                        $num = ($num + 1);
                        // Room information display
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
                    // No rooms found message
                    echo "Keine Ergebnisse gefunden";
                }
            ?>
        </tr>
    </table>

    <!-- ====== Close Database Connection ====== -->
    <?php $conn->close(); ?>
</body>

</html>
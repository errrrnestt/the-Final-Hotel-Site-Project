<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/zimmer_info.css">
    <script src="jquery/jquery.min.js"></script>
</head>

<body>

    <?php include "db_connection.php"; // Include database connection ?>

    <!-- Website header with logo and navigation menu -->
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

    <!-- "Go Back" button -->
    <div id="battons">
        <div id="btnGoBack"><button id="goback">Zurück</button></div>
        <script>
            $(document).ready(function() {
                $('#goback').click(function() {
                    window.history.back(); // Redirects to the previous page
                });
            });
        </script>
    </div>

    <!-- Title for the room information section -->
    <div id="battons">
        <h2>- Zimmer Info -</h2>
    </div>

    <?php 
    $buchung_id = null;

    // Get room ID from URL if provided
    if(isset($_GET['data-rooms'])){
        $zimmer_id = $_GET['data-rooms'];
    } 

    // Check if a booking ID is provided for deletion
    if (isset($_POST['buchung_id'])) {
        $buchung_id = $_POST['buchung_id'];

        // SQL query to delete a booking
        $sql = 'DELETE FROM buchungen WHERE Buchungs_ID = '.$buchung_id;
        $result = $conn->query($sql);

        // Display confirmation message if successful
        if ($conn->query($sql) === TRUE) {
            echo "<h3 class='B_ID'>Eine Buchung mit ID $buchung_id wurde erfolgreich gelöscht!</h3>";
        } else {
            echo "<h3 class='B_ID'>Fehler beim Löschen der Reservierung:</h3> " . $conn->error;
        }
    } else {
        echo "<h3 class='B_ID'>Die Buchungs-ID wurde nicht übertragen.</h3>"; // Error message if no ID is provided
    }
    ?>

    <!-- Table for room images and details -->
    <table class="tabelle">
        <td id="left">
            <!-- Display room images -->
            <table>
                <tr>
                    <td><img src="Photos/zimmer<?=$zimmer_id?>-1.jpg" alt="Room image 1"></td>
                    <td><img src="Photos/zimmer<?=$zimmer_id?>-2.jpg" alt="Room image 2"></td>
                </tr>
                <tr>
                    <td><img src="Photos/zimmer<?=$zimmer_id?>-3.jpg" alt="Room image 3"></td>
                    <td><img src="Photos/zimmer<?=$zimmer_id?>-4.jpg" alt="Room image 4"></td>
                </tr>
            </table>

            <?php
            // Query to fetch room details
            $sql = 'SELECT * FROM zimmer WHERE Zimmer_nummer ='.$zimmer_id;
            $result = $conn->query($sql);

            // Display room details if found
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<p id="info">Info: ' . $row['Details'] . '</p>';
            } else {
                echo "Keine Ergebnisse gefunden"; // Message if no data is found
            }
            ?>

            <?php 
            // Buttons for new booking and customer registration
            echo '<div class="custom-buttons"> 
                    <form method="get" action="kundenErstellen.php?data-rooms='.$zimmer_id.'">
                        <button id="custom-button" class="custBTN" name="data-rooms" value="'.$zimmer_id.'">Neue Buchung</button>
                    </form> 

                    <form method="get" action="kundenAnmelden.php?data-rooms='.$zimmer_id.'">
                        <button id="custom-button" class="custBTN" name="data-rooms" value="'.$zimmer_id.'">Kunde Anmelden</button>
                    </form> 
                  </div>';
            ?>
        </td>

        <!-- Right section displaying existing bookings for the room -->
        <td id="right">
            <h2 id="buchungenP">Buchungen:</h2>

            <div class="reviews-container">
                <?php
                // Query to fetch bookings for the selected room
                $sql ='SELECT k.Vorname AS Kunde, k.Vorname, b.Startdatum, b.Buchungs_ID, b.Enddatum, b.Details 
                       FROM buchungen b 
                       JOIN kunden k ON b.Kunden_ID = k.Kunden_ID 
                       WHERE b.Zimmer_Nummer = '.$zimmer_id;
                $result = $conn->query($sql);

                // Display all bookings if found
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="review" id="review">
                                    <div class="review-info">
                                    <p id="name">'. $row['Vorname'] .' </p>
                                    <p id="datum">'. $row['Startdatum'] .' bis '. $row['Enddatum'] .' </p>
                                    <p id="details">'. $row['Details'] .'</p>
                                    <form method="post" action="zimmer_info.php?data-rooms='.$zimmer_id.'">
                                        <button id="custom-button" name="buchung_id" value="'.$row['Buchungs_ID'].'">X</button>
                                    </form>
                                </div>
                              </div>';
                    }
                } else {
                    echo "Keine Ergebnisse gefunden"; // If no bookings are found for this room
                }
                ?>
            </div>
        </td>
    </tr>
    </table>
</body>

</html>

<?php $conn->close(); // Close database connection ?>

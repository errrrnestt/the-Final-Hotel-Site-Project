<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/zimmer_info.css">
    <script src="js/jquery.min.js"></script>
    <script defer src="js/filter_buttons.js"></script>

</head>

<body>

    <?php include "db_connection.php"; ?>

    <header class="header">

        <div id="logo">

            <img src="Photos/logo.png" alt="Logo">

        </div>

        <nav>
            <ul>
                <li><a href="hotel_home.php">Home</a></li>
                <li><a href="zimmer_list.php">Zimmern</a></li>
                <li><a href="buchung_list.php">Buchungen</a></li>
            </ul>
        </nav>

    </header>


    <div id="battons">

        <div id="btnGoBack">
            <button id="goback">Zurück</button>
        </div>

    </div>

    <div id="battons">

        <h2>
            - Zimmer Info -
        </h2>

    </div>

    <?php 

        $buchung_id = null;
        if(isset($_GET['data-rooms'])){
            $zimmer_id = $_GET['data-rooms'];
        } 
        
        
        if (isset($_POST['buchung_id'])) {

            $buchung_id = $_POST['buchung_id'];
        
            // Prepare SQL - Statement to delete any Entries from db

            $sql = 
            '   DELETE 
                FROM buchungen                          -- Тут всё ок --
                WHERE Buchungs_ID = '.$buchung_id.';
            ';

            $result = $conn->query($sql);
            
            if ($conn->query($sql) === TRUE) {
                echo "<h3 class='B_ID'>Eine Buchung mit ID $buchung_id wurde erfolgleich gelöscht! </h3>";
            } else {
                echo "<h3 class='B_ID'>Fehler beim Löschen der Reservierung:</h3> " . $conn->error;
            }
                    
        } else {
            echo "<h3 class='B_ID'> Die Buchungs-ID wurde nicht übertragen.</h3>";
        }
            
    ?>

    <table class="tabelle">
        <td id="left">
            <table>
                <tr>
                    <td>
                        <img src="Photos/zimmer<?=$zimmer_id?>-1.jpg" alt="">
                    </td>
                    <td>
                        <img src="Photos/zimmer<?=$zimmer_id?>-2.jpg" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="Photos/zimmer<?=$zimmer_id?>-3.jpg" alt="">
                    </td>
                    <td>
                        <img src="Photos/zimmer<?=$zimmer_id?>-4.jpg" alt="">
                    </td>
                </tr>
            </table>

            <?php

                $sql = 
                '   SELECT *                                    -- Всё ок --
                    FROM zimmer
                    WHERE Zimmer_Nummer ='.$zimmer_id.'; 
                ';

                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                        echo '<p id="info">Info:' . $row['Details'] . '</p>';
                } else {
                    echo "Keine Ergebnisse gefunden";
                }
                      
            ?>

        </td>
        <td id="right">
            <h2 id="buchungenP"> Buchungen :</h2>

        
        
            <div class="reviews-container">

                <?php

                    $sql =
                    '   SELECT
                        b.Buchungs_ID,                              -- Сверься с /db/init.sql --
                        k.Vorname,
                        k.Nachname,
                        b.Startdatum,
                        b.Enddatum,
                        b.Details
                        FROM buchungen b
                        JOIN kunden k 
                        ON b.Kunden_ID = k.Kunden_ID
                        WHERE b.Zimmer_Nummer = '.$zimmer_id.'; 
                    ';

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '
                            <div class="review" id="review">
                            <img src="logo.jpg" alt="" class="avatar">
                            <div class="review-info">
        
                            <p id="name">'. $row['Vorname'] .' </p>
                            <p id="datum">'. $row['Startdatum'] .' bis '. $row['Enddatum'] .' </p>
                            <p id="details">'. $row['Details']  .'</p>
                            <form  method="post"  action="zimmer_info.php?data-rooms='.$zimmer_id.'">
                            <button id="custom-button" name="buchung_id" value="'.$row['Buchungs_ID'].'">X</button>
                            </form>
                        
                            
                            </div>
                        </div>';
                        
                        
                        
                        }
                    } else {
                        echo "Keine Ergebnisse gefunden";
                    }
                        
                ?>

            </div>

        </td>

        </tr>

    </table>

    <?php 

     echo ' <form  method="get"  action="kundenErstellen.php?data-rooms='.$zimmer_id.'">
     <button id="custom-button" class="custBTN" name="data-rooms" value="'.$zimmer_id.'">Neue Buchung</button>
     </form>

     <form  method="get"  action="kundenAnmelden.php?data-rooms='.$zimmer_id.'">
     <button id="custom-button" class="custBTN" name="data-rooms" value="'.$zimmer_id.'">Kunde Anmelden</button>
     </form>';
     

    ?>


</body>

</html>

<?php $conn->close(); ?>
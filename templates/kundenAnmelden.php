<!DOCTYPE html>
<html lang="de">

<?php include "db_connection.php"; ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kundenAnmelden.css">
    <script src="js/jquery.min.js"></script>
    <script defer src="js/filter_buttons.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="header">

        <header>

            <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>

            <nav>

                <ul>
                    <li>
                        <a href="hotel_home.php">Home</a>
                    </li>
                    <li>
                        <a href="zimmer_list.php">Zimmern</a>
                    </li>
                    <li>
                        <a href="buchung_list.php">Buchungen</a>
                    </li>
                </ul>

            </nav>

        </header>

    </div>


    <div id="battons">

        <div id="btnGoBack">
            <button id="goback">Zurück</button>
        </div>

    </div>



    <h1>Ein Kunde anmelden:</h1>


    <div class="borderInpt">

        <form method="POST" action="">

            <div class="form-group">

                <label for="Vorname">Vorname:</label>

                <input type="text" id="Vorname" name="Vorname" placeholder="Vorname:">

            </div>

            <div class="form-group">

                <label for="Nachname">Nachname:</label>

                <input type="text" id="Nachname" name="Nachname" placeholder="Nachname:">

            </div>

            <div class="form-group">

                <label for="kontaktDaten">Ihre Adresse:</label>

                <input type="text" id="kontaktDaten" name="Kontaktdaten" placeholder="Ihre Adresse:">

            </div>

            <div class="form-group">

                <label for="E-mail">Ihre E-mail:</label>

                <input type="email" id="E-mail" name="E_mail" placeholder="E-mail:">

            </div>

            <div class="form-group">

                <label for="tel">Ihre Telefonnummer:</label>

                <input type="tel" id="tel" name="TelefonNummer" placeholder="Ihre Telefonnummer:">

            </div>

            <div class="btns">

                <form method="POST">

                    <button type="submit" class="buchungBtn">Kunden anmelden</button>
                    <button class="cancel" type="reset">Stornierung</button>

                </form>

            </div>

        </form>


    </div>

    <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $Vorname = $_POST['Vorname'];
            $Nachname = $_POST['Nachname'];
            $Kontaktdaten = $_POST['Kontaktdaten'];
            $E_mail = $_POST['E_mail'];
            $TelefonNummer = $_POST['TelefonNummer'];

            $sql = "INSERT INTO kunden (Vorname, Nachname, Kontaktdaten, E_mail, TelefonNummer)       -- Тут тоже внимательно сверься --
                    VALUES ('$Vorname', '$Nachname', '$Kontaktdaten', '$E_mail', '$TelefonNummer')";
            
            if($conn->query($sql)=== TRUE){

                echo "<h2 class='hinweis'> Kunde ist angemeldet! </h2>";

            } else {
                echo "<h2 class='hinweis'>Error". $sql . "<br>". $conn->error . "</h2>";
            }
        }

    ?>


</body>
</html>

<?php $conn->close(); ?>

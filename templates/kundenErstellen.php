<!DOCTYPE html>
<html lang="de">

    <?php include "db_connection.php"; ?>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/kundenErstellen.css">
        <script src="js/jquery.min.js"></script>
        <script defer src="js/filter_buttons.js"></script>
        <title>Document</title>
    </head>

    <body>

        <?php 

            $zimmer_id = 1;

            if($_SERVER['REQUEST_METHOD'] === 'GET'){

                $zimmer_id= $_GET['data-rooms'];

            }

        ?>

        <div class="header">

            <header>
                <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>
                <nav>
                    <ul>
                        <li><a href="hotel_home.php">Home</a></li>
                        <li><a href="zimmer_list.php">Zimmern</a></li>
                        <li><a href="buchung_list.php">Buchungen</a></li>
                    </ul>
                </nav>
            </header>

        </div>


        <!-- Zurück Taste -->
        <div id="battons">

            <div id="btnGoBack">

                <button id="goback">Zurück</button>

            </div>

        </div>


        <h1>Buchen:</h1>

        <div class="borderInpt">

            <form method="POST">

                <input type="number" name="zimmer_id" value="<?= $zimmer_id?>" hidden>

                <div class="form-group">

                    <label for="Vorname">Kunde wählen</label>

                        <select name="kunden_ID" id="kunde">

                            <option disabled selected>Kunde auswählen</option>

                            <?php 

                                $sql =
                                "   SELECT *            -- Тут всё ок --
                                    FROM kunden;
                                ";

                                $result = $conn->query($sql);

                                if($result->num_rows > 0){

                                    while($row = $result->fetch_assoc()){
                                        echo "<option value='". $row["Kunden_ID"] ."'> <div>".$row["Vorname"]."</div> </option>";  
                                    }

                                } else {
                                    echo "Es gibt keine Daten in der Tabelle.";
                                }
                            ?>

                        </select>

                </div>


                <div class="form-group">

                    <label for="personen">Wie viel Personen?</label>
                    <input type="number" id="personen" name="personen" placeholder="Wie viel Personen:">

                </div>

                <div class="form-group">

                    <label for="buchung">Dauer der Buchung (Anfang)</label>
                    <input type="date" id="buchung_startdatum" name="buchung_startdatum">

                </div>

                <div class="form-group">

                    <label for="buchung">Dauer der Buchung (Das Ende)</label>
                    <input type="date" id="buchung_enddatum" name="buchung_enddatum">

                </div>

                <!--       // Ты не используешь это
                <div class="form-group" id="fruhstück">

                    <label for="breakfast">Mit Fruhstück?</label>
                    <input type="checkbox" id="checkbox" name="mit_fruhstück" value="mit_fruhstück">

                </div>

                <div class="form-group">

                    <label for="gaeste">Gäste</label>
                    <input type="text" id="gaeste" name="gaeste" placeholder="Wie viel Gäste kommen mit Ihnen?:">

                </div>

                <div class="form-group">

                    <label for="wunsche">Ihre Wünsche::</label>
                    <textarea id="wunsche" name="wunsche" placeholder="Ihre persönlichen Wünschen:"></textarea>

                </div>

                <div class="btns">

                    <form action="">
                        <button type="submit" class="buchungBtn">speichern</button>
                        <button class="cancel" type="reset">löschen</button>
                    </form>

                </div> 

                -->

            </form>


        </div>



        <?php 
               
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $zimmer_id = $_POST['zimmer_id'];
                $kunden_id = $_POST['kunden_ID'];
                $details = $_POST['personen'];
                $startdatum = $_POST['buchung_startdatum']; 
                $enddatum = $_POST['buchung_enddatum']; 

                // Ты не используешь эти поля в БД. Доделай это.

                //$fruhstuck = isset($_POST['mit_fruhstück']);
                //$gaeste = $_POST['gaeste'];

                /*
                if (empty($zimmer_id) || empty($kunden_id) || empty($personen) || empty($startdatum) || empty($enddatum)) {
                    die(' <p id="error" >Bitte füllen Sie alle erforderlichen Felder aus.</p> ');
                }


                if(($_POST['gaeste'])){
                    $wunsche = $_POST['gaeste'];
                } else {
                    $wunsche = "keine";
                }
                

                if(($_POST['wunsche'])){
                    $wunsche = $_POST['wunsche'];
                } else {
                    $wunsche = "keine";
                }
                */
                
                $startdatum = date("Y-m-d", strtotime($_POST['buchung_startdatum']));
                $enddatum = date("Y-m-d", strtotime($_POST['buchung_enddatum']));


                $sql = 
                "   INSERT INTO buchungen (Zimmer_Nummer, Kunden_ID, Details, Startdatum, Enddatum)     -- Будь внимательным тут и тоже сверь всё --
                    VALUES ($zimmer_id, $kunden_id, 'Anzahl von Gäste: $details', '$startdatum', '$enddatum'); 
                ";


                if($conn->query($sql) === TRUE){
                    echo "<h2 class='hinweis'>Der Kunden ist in der DB gespeichert </h2>";
                } else {
                    echo "<h2 class='hinweis'> Error </h2>". $sql . "<br>". $conn->error;
                }
             
            }
                
        ?>

    </body>

</html>

<?php $conn->close(); ?>
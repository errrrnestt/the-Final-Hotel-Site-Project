<!DOCTYPE html>

<!-- ====== Database Connection ====== -->
<?php include "db_connection.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kundenErstellen.css">
    <script src="jquery/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- ====== GET request to retrieve room ID ====== -->
    <?php 
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $zimmer_id = $_GET['data-rooms'];
        }
    ?>

    <!-- ====== Header Section ====== -->
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

    <!-- ====== Back Button ====== -->
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

    <h1>Ein Buchung machen:</h1>

    <!-- ====== Booking Form ====== -->
    <div class="borderInpt">
        <form method="POST">
            <!-- Hidden field to store room ID -->
            <input type="number" name="zimmer_id" value="<?= $zimmer_id ?>" hidden>

            <!-- Customer Selection -->
            <div class="form-group">
                <label for="vollname">Kunde wählen</label>
                <select name="kunden_ID" id="kunde">
                    <option disabled selected>Kunde auswählen</option>
                    <?php 
                        $sql = "SELECT * from kunden;";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<option value='". $row["Kunden_ID"] ."'>".$row["Vorname"]."</option>";
                            }
                        }
                        else {
                            echo "<option disabled>Keine Kunden vorhanden</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Number of People -->
            <div class="form-group">
                <label for="personen">Wie viel Personen?</label>
                <input type="number" id="personen" name="personen" placeholder="Wie viel Personen:">
            </div>

            <!-- Booking Start Date -->
            <div class="form-group">
                <label for="buchung">Dauer der Buchung (Anfang)</label>
                <input type="date" id="buchung_startdatum" name="buchung_startdatum">
            </div>

            <!-- Booking End Date -->
            <div class="form-group">
                <label for="buchung">Dauer der Buchung (Das Ende)</label>
                <input type="date" id="buchung_enddatum" name="buchung_enddatum">
            </div>

            <!-- Breakfast Option -->
            <div class="form-group" id="fruhstück">
                <label for="breakfast">Mit Frühstück?</label>
                <input type="checkbox" id="checkbox" name="mit_fruhstück" value="mit_fruhstück">
            </div>

            <!-- Number of Guests -->
            <div class="form-group">
                <label for="gaeste">Gäste</label>
                <input type="text" id="gaeste" name="gaeste" placeholder="Wie viel Gäste kommen mit Ihnen?:">
            </div>

            <!-- Special Requests -->
            <div class="form-group">
                <label for="wunsche">Ihre Wünsche:</label>
                <textarea id="wunsche" name="wunsche" placeholder="Ihre persönlichen Wünschen:"></textarea>
            </div>

            <!-- Submit and Reset Buttons -->
            <div class="btns">
                <button type="submit" class="buchungBtn">Speichern</button>
                <button class="cancel" type="reset">Löschen</button>
            </div>
        </form>
    </div>

    <!-- ====== PHP Code to Handle Form Submission ====== -->
    <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form values
            $zimmer_id = $_POST['zimmer_id'];
            $kunden_id = $_POST['kunden_ID'];
            $personen = $_POST['personen'];
            $startdatum = $_POST['buchung_startdatum']; 
            $enddatum = $_POST['buchung_enddatum']; 
            $fruhstuck = isset($_POST['mit_fruhstück']) ? 'Ja' : 'Nein';
            $gaeste = $_POST['gaeste'] ?: 'Keine';
            $wunsche = $_POST['wunsche'] ?: 'Keine';

            // Validate required fields
            if (empty($zimmer_id) || empty($kunden_id) || empty($personen) || empty($startdatum) || empty($enddatum)) {
                die('<p id="error">Bitte füllen Sie alle erforderlichen Felder aus.</p>');
            }

            // Convert dates to proper format
            $startdatum = date("Y-m-d", strtotime($startdatum));
            $enddatum = date("Y-m-d", strtotime($enddatum));

            // Insert booking into database
            $sql = "INSERT INTO buchungen (Zimmer_Nummer, Kunden_ID, Details, Startdatum, Enddatum) VALUES ($zimmer_id, $kunden_id, '$wunsche', '$startdatum', '$enddatum');";
            
            if($conn->query($sql) === TRUE){
                echo "<h2 class='hinweis'>Die Buchung wurde erfolgreich gespeichert.</h2>";
            } else {
                echo "<h2 class='hinweis'>Fehler: " . $sql . "<br>" . $conn->error . "</h2>";
            }
        }
    ?>
</body>

</html>

<!-- ====== Close Database Connection ====== -->
<?php $conn->close(); ?>

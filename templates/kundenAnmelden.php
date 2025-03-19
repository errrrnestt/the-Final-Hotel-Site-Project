<!DOCTYPE html>
<html lang="de">

<!-- ====== Database Connection ====== -->
<?php include "db_connection.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kundenAnmelden.css">
    <script src="jquery/jquery.min.js"></script>
    <title>Kunden Anmeldung</title>
</head>

<body>
    <!-- ====== Header Section ====== -->
    <div class="header">
        <header>
            <!-- Logo -->
            <div id="logo"><img src="Photos/logo.png" alt="Logo"></div>
            
            <!-- Navigation Menu -->
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
                    window.history.back(); // Возвращает на предыдущую страницу
                });
            });
        </script>
    </div>

    <!-- ====== Form Title ====== -->
    <h1>Ein Kunde anmelden:</h1>

    <!-- ====== Registration Form ====== -->
    <div class="borderInpt">
        <form method="POST" action="">
            <!-- Vorname (First Name) -->
            <div class="form-group">
                <label for="Name">Vorname:</label>
                <input type="text" id="Name" name="Name" placeholder="Vorname:" required>
            </div>
            
            <!-- Adresse (Address) -->
            <div class="form-group">
                <label for="kontaktDaten">Ihre Adresse:</label>
                <input type="text" id="kontaktDaten" name="Kontaktdaten" placeholder="Ihre Adresse:" required>
            </div>
            
            <!-- E-Mail -->
            <div class="form-group">
                <label for="E-mail">Ihre E-mail:</label>
                <input type="email" id="E-mail" name="E_mail" placeholder="E-mail:" required>
            </div>
            
            <!-- Telefonnummer (Phone Number) -->
            <div class="form-group">
                <label for="tel">Ihre Telefonnummer:</label>
                <input type="tel" id="tel" name="TelefonNummer" placeholder="Ihre Telefonnummer:" required>
            </div>
            
            <!-- Buttons (Submit and Reset) -->
            <div class="btns">
                <button type="submit" class="buchungBtn">Kunden anmelden</button>
                <button class="cancel" type="reset">Stornierung</button>
            </div>
        </form>
    </div>

    <!-- ====== PHP: Form Handling & Database Insertion ====== -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получение данных из формы
        $Name = $_POST['Name'];
        $Kontaktdaten = $_POST['Kontaktdaten'];
        $E_mail = $_POST['E_mail'];
        $TelefonNummer = $_POST['TelefonNummer'];

        // SQL-запрос на добавление клиента в базу данных
        $sql = "INSERT INTO kunden (Vorname, Kontaktdaten, E_mail, TelefonNummer) 
                VALUES ('$Name', '$Kontaktdaten', '$E_mail', '$TelefonNummer')";
        
        // Проверка успешности выполнения запроса
        if($conn->query($sql) === TRUE){
            echo "<h2 class='hinweis'>Kunde ist angemeldet!</h2>";
        } else {
            echo "<h2 class='hinweis'>Error: ". $sql . "<br>". $conn->error . "</h2>";
        }
    }
    ?>

</body>
</html>

<!-- ====== Close Database Connection ====== -->
<?php $conn->close(); ?>
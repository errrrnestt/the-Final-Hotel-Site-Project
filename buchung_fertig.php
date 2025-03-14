<?php include "db_connection.php"; ?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buchung_fertig.css">
    <script src="jquery/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
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

    <div>

        <?php
         if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
            $kunden_ID = $_POST['kunden_ID'];
            $personen = $_POST['personen'];
            $z_id = $_POST['z_id'];

        

            $sql = "INSERT INTO buchungen (vollname, geb, adresse, email) VALUES ('$vollname', '$geb', '$adresse', '$email'); ";

            if($conn->query($sql)=== TRUE){
                echo "Der Benuter ist in der DB gespeichert";
            } else {
                echo "Error". $sql . "<br>". $conn->error;
            }
        }
        ?>
    </div>


    <div>
        <form action="hotel_home.php">
        <button>zur Hauptseite</button>
        </form>
        
    </div>

</body>

</html>
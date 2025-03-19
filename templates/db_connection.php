<?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_monster_transylvania";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
            die("Verbindung Fehler: " . $conn->connect_error);  
        }
?>
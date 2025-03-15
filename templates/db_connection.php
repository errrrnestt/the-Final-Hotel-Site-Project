<?php 
    // Здесь я изменил некоторые настройки (важно для докер-контейнеров)
    $servername = "mysql";  
    $username = "user";     
    $password = "password";  
    $dbname = "db_monster_transylvania";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Fehler bei der Verbindung: " . $conn->connect_error);  
    }
    
?>   
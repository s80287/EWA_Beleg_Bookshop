<?php
    $server = "localhost";
    $database = "g19";
    $username = "g19";
    $password = "or49cos";
    $connection = new mysqli($server, $username, $password, $database)
    or die("Keine Verbindung moeglich: " . mysql_error());
    $query = "SELECT * FROM buecher";
    $result = $connection->query($query)
    or die("Anfrage fehlgeschlagen: " . mysql_error());
    $data_array = array();
    while($row=mysqli_fetch_assoc($result))
    {
        $data_array[] = $row;
    }
    $fp = fopen('buecher.json', 'w');
    fwrite($fp, json_encode($data_array));
    fclose($fp);
    $connection->close();
?>
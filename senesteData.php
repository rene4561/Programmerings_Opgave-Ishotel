<?php
    include ('open_mmddb.php');

    $source = $_GET['s'];
    $system = $_GET ['sys'];
    /*SELECT value, obstime FROM  iot
    WHERE system = "IdaErin" AND source="lufttemperatur"
    ORDER BY id DESC LIMIT 1*/
    $sql = 'SELECT value, obstime ';
    $sql = $sql . ' FROM iot '; 
    $sql = $sql . ' WHERE system = "'. $system.'" AND source = "' . $source .'" ';
    $sql = $sql . ' ORDER BY id DESC LIMIT 1';

    //echo "sql: " .$sql;

    $resultat = mysqli_query($conn, $sql);

    $jsonArray = array();

    while($row = mysqli_fetch_assoc($resultat)){
        $jsonArray[] = $row;
    }

    print json_encode($jsonArray);
?>
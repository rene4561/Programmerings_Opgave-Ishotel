<?php
    include ('open_mmddb.php');

    $source = $_GET['s'];
    $system = $_GET ['sys'];
    $obstime = $_GET['obs'];

    $sql = 'SELECT left(obstime, 13) ';
    $sql = $sql . ' as nobstime,';
    $sql = $sql . ' avg(value) as nvalue ';
    $sql = $sql . ' FROM iot '; 
    $sql = $sql . ' WHERE system = "'. $system.'" AND source = "' . $source .'" ';
    $sql = $sql . ' AND obstime >= DATE_SUB(NOW(), INTERVAL ' . $obstime . ') ';
    $sql = $sql . ' GROUP BY nobstime';

    //echo "sql: " .$sql;

    $resultat = mysqli_query($conn, $sql);

    $jsonArray = array();

    while($row = mysqli_fetch_assoc($resultat)){
        $jsonArray[] = $row;
    }

    print json_encode($jsonArray);
?>
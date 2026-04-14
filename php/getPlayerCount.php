<?php
    include_once(__DIR__ . "/connection.php");

    $query = $conn->prepare("SELECT count(name) AS player_count FROM ConnectedPlayers");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        echo "No data found.";
        exit;
    }

    echo json_encode($result);
?>
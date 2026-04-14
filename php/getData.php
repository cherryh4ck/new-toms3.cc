<?php
    include_once(__DIR__ . "/connection.php");

    $query = $conn->prepare("SELECT * FROM ServerData WHERE id = 1");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result){
        echo "No data found.";
        exit;
    }

    $data['last_updated'] = gmdate("Y-m-d\TH:i:s\Z");
    echo json_encode($result);
?>
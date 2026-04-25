<?php
    include_once(__DIR__ . "/connection.php");

    $query = $conn->prepare("SELECT * FROM ChatData ORDER BY id ASC;");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if (!$result){
        echo "No data found.";
        exit;
    }

    echo json_encode($result);
?>
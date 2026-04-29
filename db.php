<?php
//connessione al db
$host = "localhost";
$db   = "petshelter_db";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // messaggio di errore in caso di fallimento
    echo json_encode(["error" => "connessione fallita: " . $e->getMessage()]);
    exit;
}
?>

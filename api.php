<?php
header("Content-Type: application/json");
include_once 'db.php';

// leggo l'azione dall'url
$azione = $_GET['action'] ?? '';

if ($azione == 'lista') {
    $stmt = $conn->query("SELECT * FROM animali WHERE stato = 'disponibile'");
    $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($risultato);
} else {
    http_response_code(404);
    echo json_encode(["status" => "errore", "messaggio" => "servizio non trovato"]);
}
?>

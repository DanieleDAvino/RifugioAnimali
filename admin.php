<?php
include_once 'db.php';

//inserimento nuovo animale
if (isset($_POST['aggiungi'])) {
    $sql = "INSERT INTO animali (nome, specie, eta) VALUES (?, ?, ?)";
    $conn->prepare($sql)->execute([$_POST['nome'], $_POST['specie'], $_POST['eta']]);
}

//cancellazione animale
if (isset($_GET['elimina'])) {
    $sql = "DELETE FROM animali WHERE id = ?";
    $conn->prepare($sql)->execute([$_GET['elimina']]);
}


$animali = $conn->query("SELECT * FROM animali")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Admin PetShelter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container"><span class="navbar-brand">PetShelter Admin</span></div>
    </nav>

    <div class="container">
        <div class="card p-4 mb-4 shadow-sm">
            <h5 class="mb-3">Inserisci Nuovo Ospite</h5>
            <form method="POST" class="row g-3">
                <div class="col-md-4"><input type="text" name="nome" class="form-control" placeholder="Nome" required></div>
                <div class="col-md-3"><input type="text" name="specie" class="form-control" placeholder="Specie (es. Cane)" required></div>
                <div class="col-md-2"><input type="number" name="eta" class="form-control" placeholder="Età" required></div>
                <div class="col-md-3"><button type="submit" name="aggiungi" class="btn btn-primary w-100">Registra</button></div>
            </form>
        </div>

        <table class="table table-hover bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Specie</th>
                    <th>Età</th>
                    <th>Stato</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($animali as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['nome']) ?></td>
                    <td><?= htmlspecialchars($a['specie']) ?></td>
                    <td><?= $a['eta'] ?> anni</td>
                    <td><span class="badge bg-info text-dark"><?= $a['stato'] ?></span></td>
                    <td><a href="?elimina=<?= $a['id'] ?>" class="btn btn-sm btn-outline-danger">Rimuovi</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php

include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->addProker();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Program Kerja</title>
</head>
<body>
    <h2>Add New Program Kerja</h2>
    <form action="" method="POST">
        <label for="nomor">Nomor Program:</label>
        <input type="number" id="nomor" name="nomor" required>
        <br><br>
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>
        
        <label for="surat_keterangan">Surat Keterangan:</label>
        <input type="text" id="surat_keterangan" name="surat_keterangan" required>
        <br><br>
        
        <button type="submit">Add Program</button>
    </form>
    <br>
    <a href="list_proker.php">Back to Program List</a>
</body>
</html>

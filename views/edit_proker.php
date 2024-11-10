<?php
include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateProker();
    header("Location: list_proker.php");
    exit();
}

if (isset($_GET['nomor'])) {
    $nomorProgram = (int)$_GET['nomor'];
    $program = $controller->programModel->fetchOneProgramKerja($nomorProgram);
} else {
    header("Location: list_proker.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Program Kerja</title>
</head>
<body>
    <h2>Edit Program Kerja</h2>
    <form action="edit_proker.php" method="POST">
        <label for="nomor">Nomor :</label>
        <input type="text" name="nomor" value="<?php echo htmlspecialchars($program['nomor']); ?>">
        <br><br>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($program['nama']); ?>" required>
        <br><br>
        
        <label for="surat_keterangan">Surat Keterangan:</label>
        <textarea id="surat_keterangan" name="surat_keterangan" required><?php echo htmlspecialchars($program['surat_keterangan']); ?></textarea>
        <br><br>
        
        <button type="submit">Update Program</button>
    </form>
    <br>
    <a href="list_proker.php">Back to Program List</a>
</body>
</html>

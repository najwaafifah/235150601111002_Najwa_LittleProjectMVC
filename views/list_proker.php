<?php
include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

// Fetch the list of programs
$programs = $controller->programModel->fetchAllProgramKerja();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Program Kerja</title>
</head>
<body>
    <h2>Program Kerja List</h2>
    
    <?php 
    if (!empty($programs)): ?>
        <ul>
            <?php foreach ($programs as $program): ?>
                <li>
                    <strong><?php echo 'Nama : ' . htmlspecialchars($program['nama']); ?></strong>
                    <p><?php echo 'Surat keterangan : ' .htmlspecialchars($program['surat_keterangan']); ?></p>
                    <p><?php echo 'Nomor : ' .htmlspecialchars($program['nomor']); ?></p>
                    <a href="edit_proker.php?nomor=<?php echo $program['nomor']; ?>">Edit</a> |
                    <a href="../controllers/ProgramKerja.php?action=delete&nomor=<?php echo $program['nomor']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No programs available.</p>
    <?php endif; ?>

    <br>
    <a href="add_proker.php">Add New Program</a> |
    <a href="../logout.php">Logout</a>
</body>
</html>

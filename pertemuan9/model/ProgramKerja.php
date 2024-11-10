<?php

require("../config/koneksi_mysql.php");

$controller = new ProgramKerjaController();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
            if (isset($_GET['nomor'])) {
                $controller->deleteProker();
            }
            break;
        case 'edit':
            $controller->updateProker();
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else {
    // echo "No action specified.";
}

class ProgramKerja 
{
    private int $nomorProgram;
    private string $nama;
    private string $suratKeterangan;


    public function createModel(
        $nomorProgram = "",
        $nama = "",
        $suratKeterangan = "",
    )
    {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        global $mysqli;
        
            $query = "SELECT * FROM program_kerja";
            $result = $mysqli->query($query);
        
            if ($result && $result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
    }

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insertProgramKerja() 
    {
        global $mysqli;
        $query = "INSERT INTO program_kerja (nomor, nama, surat_keterangan) 
                  VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("iss", $this->nomorProgram, $this->nama, $this->suratKeterangan);
        return $stmt->execute();
    }

    public function updateProgramKerja($nomor, $title, $suratKeterangan)
    {
        global $mysqli; 
        $sql = "UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?";
        
        $stmt = $mysqli->prepare($sql);
    
        $stmt->bind_param('ssi', $title, $suratKeterangan, $nomor);
    
        if ($stmt->execute()) {
            return true; // Successful update
        } else {
            return false; // Failed update
        }
    }
    
    

    public function deleteProgramKerja($nomor)
{
    global $mysqli; 
    
    // Prepare the SQL query to delete the program based on the 'nomor'
    $sql = "DELETE FROM program_kerja WHERE nomor = ?";
    
    // Prepare the statement
    $stmt = $mysqli->prepare($sql);
    
    // Bind the parameter (the program number)
    $stmt->bind_param('i', $nomor);
    
    // Execute the query and check if the deletion is successful
    if ($stmt->execute()) {
        return true; // Successful delete
    } else {
        return false; // Failed delete
    }
}

}
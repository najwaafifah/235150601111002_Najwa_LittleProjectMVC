<?php

include_once("../model/ProgramKerja.php");

// if (isset($_GET['nomor'])) {
//     $controller = new ProgramKerjaController();
//     $controller-> deleteProker(); 
// }

class ProgramKerjaController 
{
    public $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function viewAddProker()
    {
        include("views/add_proker.php");
    }

    public function viewEditProker()
    {
        // This is to edit an existing program, pass data from the model to the view
        $nomorProgram = $_GET['nomorProgram']; // Assuming the program number is passed in the URL
        $program = $this->programModel->fetchOneProgramKerja($nomorProgram);
        include("views/edit_proker.php");
    }
    public function viewListProker()
    {
        $programs = $this->programModel->fetchAllProgramKerja();
        include("../views/list_proker.php");
    }
    

    public function addProker()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo 'method post berhasil';
            $nomorProgram = $_POST['nomor'];
            $title = $_POST['title'];
            $suratKeterangan = $_POST['surat_keterangan'];

            $this->programModel->createModel($nomorProgram, $title, $suratKeterangan);
            
            if ($this->programModel->insertProgramKerja()) {
                header("Location: list_proker.php");
                exit();
            } else {
                echo "Failed to add Program Kerja. Please try again.";
            }
        }
    }

    public function updateProker()
    {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nomorProgram = $_POST['nomor']; 
        $title = $_POST['title'];
        $suratKeterangan = $_POST['surat_keterangan'];

        $this->programModel->createModel($nomorProgram, $title, $suratKeterangan);

            if ($this->programModel->updateProgramKerja($nomorProgram, $title, $suratKeterangan)) {
                header("Location: list_proker.php");
                exit();
            } else {
                echo "Failed to update Program Kerja. Please try again.";
            }
        }
    }


    public function deleteProker()
    {
        if (isset($_GET['nomor'])) {
            $nomorProgram = $_GET['nomor'];
            if ($this->programModel->deleteProgramKerja($nomorProgram)) {
                header("Location: ../views/list_proker.php"); // Redirect after successful deletion
                exit();
            } else {
                echo "Failed to delete Program Kerja. Please try again.";
            }
        } else {
            echo "Program number not specified.";
        }
    }

    
}

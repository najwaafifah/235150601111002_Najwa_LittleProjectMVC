<?php

include_once("model/ProgramKerja.php");

class ProgramKerjaController 
{
    private $programModel;

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
        include("views/edit_proker.php");
    }

    public function viewListProker()
    {
        include("views/list_proker.php");
    }

    public function addProker()
    {
        // implementasi logic nambah proker dengan pemanggila model juga
    }

    public function updateProker()
    {
        // implementasi logic update proker dengan pemanggila model juga
    }

    public function deleteProker()
    {
        // implementasi logic hapus proker dengan pemanggila model juga
    }
}
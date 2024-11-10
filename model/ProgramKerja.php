<?php

require("config/koneksi_mysql.php");

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
        // implementasi fetch all rows with select
    }

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        // implementasi fetch one row by nomor proker with select
    }

    public function insertProgramKerja() 
    {
        // implementasi sql insert
    }

    public function updateProgramKerja()
    {
        // implementasi sql update
    }

    public function deleteProgramKerja()
    {
        // implementasi sql delete   
    }
}
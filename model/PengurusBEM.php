<?php

require("config/koneksi_mysql.php");

class PengurusBEM 
{
    private string $nama;
    private string $nim;
    private int $angkatan;
    private string $jabatan;
    private string $foto;
    private string $password;

    public function createModel(
        $nama = "",
        $nim = "",
        $angkatan = "",
        $jabatan = "",
        $foto = "",
        $password = "",
    )
    {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->angkatan = $angkatan;
        $this->jabatan = $jabatan;
        $this->foto = $foto;
        $this->password = $password;
    }

    public function fetchAllPengurusBEM()
    {
        // implementasi fetch all rows with select
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        // implementasi fetch one row by nim with select
    }

    public function insertPengurusBEM() 
    {
        $result = $mysqli->query("INSERT INTO pengurus_bem VALUES ('$this->nama', '$this->nim', '$this->angkatan', '$this->jabatan', '$this->foto', '$this->password')");
    }

    public function updatePengurusBEM()
    {
        // implementasi sql update
    }

    public function deletePengurusBEM()
    {
        // implementasi sql delete   
    }
}
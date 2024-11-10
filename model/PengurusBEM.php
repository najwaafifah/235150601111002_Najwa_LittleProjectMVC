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
        $password = ""
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
        global $mysqli;
        $query = "SELECT * FROM pengurus_bem";
        $result = $mysqli->query($query);

        if ($result) {
            $pengurusList = $result->fetch_all(MYSQLI_ASSOC);
            return $pengurusList;
        }
        return [];
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        global $mysqli;
        $query = "SELECT * FROM pengurus_bem WHERE nim = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function insertPengurusBEM() 
    {
        global $mysqli;
        $query = "INSERT INTO pengurus_bem (nama, nim, angkatan, jabatan, foto, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssisss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updatePengurusBEM(string $nim)
    {
        global $mysqli;
        $query = "UPDATE pengurus_bem SET nama = ?, angkatan = ?, jabatan = ?, foto = ?, password = ? WHERE nim = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sissss", $this->nama, $this->angkatan, $this->jabatan, $this->foto, $this->password, $nim);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deletePengurusBEM(string $nim)
    {
        global $mysqli;
        $query = "DELETE FROM pengurus_bem WHERE nim = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $nim);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function validateLogin($nim, $password)
    {
        global $mysqli;
        
        // Fetch all pengurus BEM records
        $pengurusList = $this->fetchAllPengurusBEM();
        
        // Loop through the fetched data to find a matching NIM and password
        foreach ($pengurusList as $pengurus) {
            // If NIM matches, check if password is correct
            if ($pengurus['nim'] === $nim && password_verify($password, $pengurus['password'])) {
                return true; // Valid login
            }
        }
        
        return false; // Invalid login
    }
}

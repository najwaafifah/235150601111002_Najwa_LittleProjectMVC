<?php

include_once("model/PengurusBEM.php");

class PengurusController 
{
    private $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusBEM();
    }

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
    

    public function viewRegister()
    {
        include("views/register_view.php");
    }

    public function registerAccount()
{
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $angkatan = $_POST['angkatan'];
        $jabatan = $_POST['jabatan'];
        $foto = $_POST['foto'];
        $password = $_POST['password'];
        
        $this->pengurusModel->createModel($nama, $nim, $angkatan, $jabatan, $foto, $password);
        
        $result = $this->pengurusModel->insertPengurusBEM();

        if ($result) {
            echo "Registration successful. You can now <a href='views/login_view.php'>login here</a>.";
        } else {
            echo "Registration failed. Please try again.";
        }
}



    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $nim = $_POST['nim'];
        $password = $_POST['password'];
    
        if ($this->pengurusModel->validateLogin($nim, $password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['nim'] = $nim;
            echo 'Login berhasil!';
            header("Location: views/list_proker.php");
            exit();
        } else {
            echo "Login gagal, periksa NIM atau password.";
        }
    }

        public function logout()
    {
        session_start();
        session_destroy();
        header("Location: views/login_view.php");
        exit();
    }

    
}
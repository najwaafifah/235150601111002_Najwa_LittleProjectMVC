<?php

include_once("model/PengurusBEM.php");

class PengurusController 
{
    private $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusBEM();
    }

    public function viewRegister()
    {
        include("views/register_view.php");
    }

    public function registerAccount()
    {
        // implementasi register akun dengan memanggil model juga
    }

    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        // implementasi logic login akun dengan memanggil model juga
    }
}
<?php

namespace App\Service;

class Config
{
    public $conn;

    public function __construct()
    {
        $connection = mysqli_connect('localhost', 'root', '', 'deploy_resit');
        
        $this->conn = $connection;

        if (!$connection) {
            die('connec ction fakhed : ' . mysqli_connect_error());
        }   
    }
}
?>
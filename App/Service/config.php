<?php

namespace App\Service;
// <!-- Get-Content "C:\Users\Administrator\development\e-resit\database\deploy_resit.sql" | mysql -u root deploy_resit  -->
// mysql -u root deploy_resit < /Users/zunnurhaqzulkifli/Development/Laravel/not_work/e-resit/database/deploy_resit.sql

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
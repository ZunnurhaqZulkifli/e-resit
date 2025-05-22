<?php

namespace App\Models;

use App\Service\Config;
use App\Service\Auth;

class User
{
    // mysql -u root deploy_resit < /Users/zunnurhaqzulkifli/Development/Laravel/not_work/e-resit/database\ file/deploy_resit.sql
    public $id;
    public $name;
    public $email;
    public $role;

    public function __construct()
    {   
        //
    }

    public static function all()
    {
        $users = [];
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM users";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            foreach ($result as $row) {
                $user = new User();
                $user->setUser($row);
                $users[] = $user;
            }
        }

        return $users ?? [];
    }

    public static function find($id)
    {
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $user = new User();
            $user->setUser($row);
            return $user;
        }

        return null;
    }

    public function profile($id = null) : Profile {

        // pass the id of the user to get the profile else it'll get the logged in user's profile
        if($id == null) {
            $id = Auth::user()->id;
        }

        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM user_profiles WHERE user_id = '$id'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        $user_profile = new Profile();
        $user_profile->setProfile($row);
        
        return $user_profile;
    }

    public function setUser(array $data)
    {
        $this->id    = $data['id']    ?? null;
        $this->name  = $data['name']  ?? null;
        $this->email = $data['email'] ?? null;
        $this->role  = $data['role']  ?? null;

        return $this;
    }

    public function unpaidReceipt()
    {
        $config = new Config();
        $query  = $config->conn;

        $select = "SELECT * FROM receipts WHERE student_id = $this->id AND status = 'pending'";
        $result = mysqli_query($query, $select);
        $rows   = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($rows) {
            foreach ($rows as $row) {
                $receipt = new Receipt();
                $receipt->setReceipt($row); 
                return $receipt;
            }
        }

        return null;
    }

    public function receipts()
    {
        $config = new Config();
        $query  = $config->conn;

        $select = "SELECT * FROM receipts WHERE student_id = $this->id AND status = 'paid'";
        $result = mysqli_query($query, $select);
        $rows   = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($rows) {
            $receipts = [];
            foreach ($rows as $row) {
                $receipt = new Receipt();
                $receipt->setReceipt($row); 
                $receipts[] = $receipt;
            }

            return $receipts;
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }
}


?>
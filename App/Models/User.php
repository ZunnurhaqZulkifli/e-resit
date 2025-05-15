<?php

namespace App\Models;

use App\Service\Config;

class User
{
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

    public function setUser(array $data)
    {
        $this->id    = $data['id']    ?? null;
        $this->name  = $data['name']  ?? null;
        $this->email = $data['email'] ?? null;
        $this->role  = $data['role']  ?? null;

        return $this;
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
<?php

namespace App\Models;

use App\Service\Config;

class Lecturer
{
    public $id;
    public $name;
    public $email;
    public $createdAt;
    public $updatedAt;

    public function __construct()
    {
        //
    }

    public static function all()
    {
        $users = [];
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM users WHERE role = 'lecturer'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            foreach ($result as $row) {
                $lecturer = new User();
                $lecturer->setUser($row);
                $lecturers[] = $lecturer;
            }
        }

        return $lecturers ?? [];
    }

    public static function find($id)
    {
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM users WHERE id = '$id' AND role = 'lecturer'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $user = new User();
            $user->setUser($row);
            return $user;
        }

        return null;
    }

    public function create(array $data)
    {
        return true;
    }
}
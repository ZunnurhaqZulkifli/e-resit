<?php

namespace App\Service;

use App\Service\Config;
use App\Models\User;

class Auth
{
    public function __construct()
    {
        if (basename($_SERVER['SCRIPT_FILENAME']) === 'login_page.php') {
            return;
        }

        if(!$this->isLoggedIn()) {
            header('Location: login_page.php');
        }
    }

    public static function user()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if(array_key_exists('user', $_SESSION ?? [])) {
            return $_SESSION['user'];
        } else {
            return null;
        }
    }

    public function isLoggedIn() : bool
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(array_key_exists('user', $_SESSION)) {
            $_SESSION['user'];
        } else {
            $_SESSION['user'] = null;
        }

        return isset($_SESSION['user']) && $_SESSION['user'] !== null;
    }

    public static function login($email, $password)
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if($email != '' && $password != '') {
            $config = new Config();
            $query = $config->conn;
            $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($query, $select);
            $row = mysqli_fetch_array($result);

            if ($row) {
                $user = new User();
                $_SESSION['user'] = $user->setUser($row);
                header("Location: main.php");
                return;

            } else {
                echo "<script type='text/javascript'>
                        alert('Sila Masukkan Maklumat Yang Betul !');
                        window.location.href = 'login_page.php';
                      </script>";
                return;
            }
        }
    }

    public static function create($email, $password, $name, $role)
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if($email != '' && $password != '') {
            $config = new Config();
            $query = $config->conn;
            $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($query, $select);
            $row = mysqli_fetch_array($result);

            if ($row) {
                echo "<script type='text/javascript'>
                        alert('Sudah Ada Akaun !');
                        window.location.href = 'login_page.php';
                      </script>";

                return;

            } else {
                $insertx = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
                $resultx = mysqli_query($query, $insertx);

                $selectx = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                $rowx = mysqli_fetch_array(mysqli_query($query, $selectx));

                if ($resultx && $rowx) {
                    $user = new User();
                    $_SESSION['user'] = $user->setUser($rowx);

                    echo "<script type='text/javascript'>
                        window.location.href = 'register_page_2.php';
                      </script>";

                    return;
                } else {
                    echo "<script type='text/javascript'>
                        alert('Ralat Pangkalan Data !');
                        window.location.href = 'login_page.php';
                      </script>";

                    return;
                }
            }
        }
    }

    public static function createProfile(array $data) {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user = $_SESSION['user'];
        $id = $user->id;

        $config = new Config();
        $query = $config->conn;

        $insert = "INSERT INTO user_profiles (user_id, id_number, dob, job_title, child_count, address, phone, semester, session, department, section) 
            VALUES ('{$id}', '{$data['id_number']}', '{$data['dob']}', '{$data['job_title']}', '{$data['child_count']}', '{$data['address']}', '{$data['phone']}', '{$data['semester']}', '{$data['session']}', '{$data['department']}', '{$data['section']}')";
        
        $resultx = mysqli_query($query, $insert);

        if ($resultx) {
            echo "<script type='text/javascript'>
                alert('Profil Berjaya Dicipta !');
                window.location.href = 'main.php';
              </script>";

            return;
        } else {
            echo "<script type='text/javascript'>
                alert('Ralat Pangkalan Data !');
                window.location.href = 'register_page_2.php';
              </script>";

            return;
        }
    }

    public static function logout()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['user']);
        session_destroy();
        header('Location: login_page.php');
    }
}
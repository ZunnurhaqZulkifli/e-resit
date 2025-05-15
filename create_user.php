<?php
 require __DIR__ . '/vendor/autoload.php';
 
 use App\Service\Auth;

$name = null;
$email = null;
$password = null;
$role = null;

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $name = trim($_POST["name"] ?? "");
    $role = trim($_POST["role"] ?? "");

    if($email && $password && $name && $role) {
        Auth::create($email, $password, $name, $role);
    }
 }
?>

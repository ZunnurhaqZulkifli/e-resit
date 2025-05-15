<?php
 require __DIR__ . '/vendor/autoload.php';
 
 use App\Service\Auth;

$email = null;
$password = null;

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if($email && $password) {
        Auth::login($email, $password);
    }
 }
?>

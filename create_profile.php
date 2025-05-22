<?php
 require __DIR__ . '/vendor/autoload.php';
 
 use App\Service\Auth;

 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $data = [
        'id_number'   => trim($_POST["id_number"] ?? ""),
        'dob'         => trim($_POST["dob"] ?? ""),
        'job_title'   => trim($_POST["job_title"] ?? ""),
        'child_count' => trim($_POST["child_count"] ?? ""),
        'address'     => trim($_POST["address"] ?? ""),
        'phone'       => trim($_POST["phone"] ?? ""),
        'semester'    => trim($_POST["semester"] ?? ""),
        'session'     => trim($_POST["session"] ?? ""),
        'department'  => trim($_POST["department"] ?? ""),
        'section'     => trim($_POST["section"] ?? ""),
    ];

    if($data) {
        Auth::createProfile($data);
    }
 }
?>

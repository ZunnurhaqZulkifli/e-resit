<?php
    require __DIR__ . '/vendor/autoload.php';
    
    use App\Service\Auth;
    new Auth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="app/css/main.css">
</head>

<body>
    <?php include 'sidebar.php'; ?>
        <main class="main">
            <h1>SELAMAT DATANG KE SISTEM E-KEWANGAN KSK</h1>
            <p>Sistem simpanan resit dan cetakan.</p>
            <a href="student_reciept.php" class="button">Mula</a>
        </main>
    <script src="app/js/index.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>

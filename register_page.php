<?php

require __DIR__ . '/vendor/autoload.php';

    use App\Service\Config;
    new Config();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Create - E-Resit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="app/css/main.css">
</head>

<body>
    <!-- Sidebar Menu -->
    <?php include('sidebar_unauthed.php'); ?>

    <!-- Main Content -->
    <main class="main">
        <div class="main-block">
            <div class="text">Daftar (1 / 2)</div>
            <p>
                <i class="fas fa-user-plus"></i> Cipta Akaun Baru
            </p>

            <br>

            <form action="create_user.php" method="POST">

                <div class="data">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required />
                </div>

                <div class="data">
                    <label for="email">Emel</label>
                    <input type="text" id="email" name="email" required />
                </div>

                <div class="data">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" required />
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                        👁️
                        </button>
                    </div>
                </div>

                <div class="data">
                    <label for="role">Peranan</label>
                    <select name="role" id="role">
                        <option value="student">
                            Pelajar
                        </option>
                        <option value="lecturer">
                            Pengajar
                        </option>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn">
                    <i class="fas fa-user-plus"></i> Cipta Akaun
                </button>
            </form>
        </div>
    </main>

    <script src="app/js/index.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="app/css/main.css">
</head>
<body>
    <?php include('sidebar_unauthed.php'); ?>

    <main class="main">
        <div class="container">
            <div class="text">Sistem Kewangan KSK</div>
            <form action="login.php" method="POST">
                <div class="data">
                    <label>Emel</label>
                    <input type="text" name="email" required>
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
                <button class="btn" type="submit" name="submit">Log Masuk</button>
            </form>
            <br>

            <div class="btn-group">
                <form action="register_page.php">
                    <button class="btn-2" value="submit">Pendaftaran</button>
                    <button class="btn-2" value="submit">Lupa Password ?</button>
                </form>
            </div>

            <?php if (! empty($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
        </div>
    </main>

    <script src="app/js/index.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
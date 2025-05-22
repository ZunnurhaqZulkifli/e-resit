<?php

require __DIR__ . '/vendor/autoload.php';
    use App\Service\Auth;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Profile User - E-Resit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="app/css/main.css">
</head>

<body>
    <!-- Sidebar Menu -->
    <?php include('sidebar_unauthed.php'); ?>

    <!-- Main Content -->
    <main class="main">
        <div class="main-block">
            <div class="text">Daftar (2 / 2)</div>
            <p>
                <i class="fas fa-user-plus"></i> Cipta Profil
            </p>

            <br>

            <form action="create_profile.php" method="POST">

                <div class="data">
                    <label for="id_number">No Kad Pengenalan</label>
                    <input type="text" id="id_number" name="id_number" required />
                </div>

                <div class="data">
                    <label for="dob">Tarikh Lahir</label>
                    <input type="date" id="dob" name="dob" required />
                </div>

                <div class="data">
                    <label for="address">Alamat</label>
                    <input type="text" id="address" name="address" required />
                </div>

                <div class="data">
                    <label for="phone">No Telefon</label>
                    <input type="text" id="phone" name="phone" required />
                </div>

                <div class="data"
                    style="<?php if (Auth::user()->role == 'lecturer') { echo 'display: none;'; } ?>"
                >
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester">
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                    </select>
                </div>

                <div class="data"
                    style="<?php if (Auth::user()->role == 'lecturer') { echo 'display: none;'; } ?>"
                >
                    <label for="session">Sesi</label>
                    <select name="session" id="session">
                        <option value="2023/2024">2023/2024</option>
                        <option value="2024/2025">2024/2025</option>
                        <option value="2025/2026">2025/2026</option>
                        <option value="2026/2027">2026/2027</option>
                        <option value="2027/2028">2027/2028</option>
                        <option value="2028/2029">2028/2029</option>
                        <option value="2029/2030">2029/2030</option>
                    </select>
                </div>

                <div class="data"
                    style="<?php if (Auth::user()->role != 'lecturer') { echo 'display: none;'; } ?>"
                >
                    <label for="job_title">Jawatan Pekerjaan</label>
                    <input type="text" id="job_title" name="job_title"/>
                </div>

                <div class="data"
                    style="<?php if (Auth::user()->role != 'lecturer') { echo 'display: none;'; } ?>"
                >
                    <label for="child_count">Bilangan Anak</label>
                    <input type="text" id="child_count" name="child_count"/>
                </div>

                <div class="data"
                    style="<?php if (Auth::user()->role != 'lecturer') { echo 'display: none;'; } ?>"
                >
                    <label for="department">Jabatan</label>
                    <select name="department" id="department">
                        <option value="mekanikal & pengeluaran">Mekanikal & Pengeluaran</option>
                        <option value="elektrik & elektrikal">Elektrik & Elektrikal</option>
                    </select>
                </div>

                <div class="data"
                    style="<?php if (Auth::user()->role != 'lecturer') { echo 'display: none;'; } ?>"
                >
                    <label for="section">Bahagian</label>
                    <select name="section" id="section">
                        <option value="diploma teknologi pembuatan">Diploma Teknologi Pembuatan</option>
                        <option value="diploma teknologi automotif">Diploma Teknologi Automotif</option>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn">
                    <i class="fas fa-user-plus"></i> Cipta Profil
                </button>
            </form>
        </div>
    </main>

    <script src="app/js/index.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
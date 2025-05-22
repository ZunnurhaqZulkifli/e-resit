<?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Models\Lecturer;
    use App\Models\User;
    use App\Service\Auth;
    new Auth();
    
    $user = Auth::user();
    $lecturers = Lecturer::all();
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrfToken;

    $unpaid = User::find($user->id)->unpaidReceipt();

    if(!empty($unpaid)) {
        header("Location: receipt_cart.php?id={$unpaid->id}");
    }
    
?>

<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <title>Daftar Resit Pelajar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="app/css/main.css" />
</head>

<body>
    <?php include('sidebar.php'); ?>
    <main class="main">
        <div>
            <div class="text">Daftar Resit Pelajar ( 1 / 2 )</div>
        </div>
        <div class="main-block">
            <form action="./save_receipt_1.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                <h1>PENDAFTARAN RESIT PELAJAR</h1>

                <!-- Pengajar Details -->
                <fieldset>
                    <legend><h3>Maklumat Pengajar</h3></legend>
                    <div>
                        <label>Pengajar</label>
                        <select name="lecturer_id" id="lecturer" required>
                            <option value="<?php echo null; ?>">Sila Pilih</option>

                            <?php if (isset($_GET['lecturer_id'])): ?>
                                <option value="<?= $_GET['lecturer_id'] ?>" selected>
                                    <?= Lecturer::find($_GET['lecturer_id'])->name ?>
                                </option>
                            <?php else: ?>
                                <?php foreach ($lecturers as $lecturer): ?>
                                        <option value="<?= $lecturer->id ?>">
                                            <?= $lecturer->name ?>
                                        </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div>
                        <label>Jabatan</label>
                        <input type="text" readonly name="department" id="department" value="<?php
                                if (isset($_GET['lecturer_id'])) {
                                    $lecturer = User::find($_GET['lecturer_id']);

                                    print_r($lecturer->profile($_GET['lecturer_id'])->department);
                                } else {
                                    echo "Sila pilih pengajar";
                                }
                            ?>
                        ">
                    </div>

                    <div>
                        <label>Bahagian</label>
                        <input type="text" readonly name="section" id="section" value="<?php
                                if (isset($_GET['lecturer_id'])) {
                                    $lecturer = User::find($_GET['lecturer_id']);

                                    print_r($lecturer->profile($_GET['lecturer_id'])->section);
                                } else {
                                    echo "Sila pilih pengajar";
                                }
                            ?>
                        ">
                    </div>
                </fieldset>

                <!-- Maklumat Pelajar -->
                <fieldset>
                    <legend><h3>MAKLUMAT PELAJAR</h3></legend>
                    <div>
                        <label>Nama</label>
                        <input id="name" type="text" name="name" readonly>
                    </div>
                    <div>
                        <label>Emel</label>
                        <input id="email" type="email" name="email" readonly>
                    </div>
                    <div>
                        <label>No. Kad Pengenalan</label>
                        <input id="id_number" type="text" name="id_number" readonly>
                    </div>

                    <div>
                        <label>Semester</label>
                        <input id="semester" type="text" name="semester" readonly>
                    </div>

                    <div>
                        <label>Sesi</label>
                        <input id="session" type="text" name="session" readonly>
                    </div>

                </fieldset>

                <button type="submit" class="new-button-link">
                    <i class="fas fa-print"></i> Simpan
                </button>
            </form>
            <?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
        </div>
    </main>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Prefilling form with user data...");
            
            document.getElementById('name').value = "<?php echo $user->name; ?>";
            document.getElementById('email').value = "<?php echo $user->email; ?>";
            document.getElementById('id_number').value = "<?php echo $user?->profile()?->id_number; ?>";
            document.getElementById('semester').value = "<?php echo $user?->profile()?->semester; ?>";
            document.getElementById('session').value = "<?php echo $user?->profile()?->session; ?>";

            const lecturerSelect = document.getElementById('lecturer');

            lecturerSelect.addEventListener('change', function() {
                console.log("Lecturer selected: ", this.value);

                if(this.value) {                    
                    window.location.href = `./student_reciept.php?lecturer_id=${this.value}`;
                } else {
                    window.location.href = `./student_reciept.php`;
                }
            });
            
        });

        function printReceipt() {
            window.print();
        }
    </script>
    <!-- Background Image -->
    <div class="background-image">
        <img src="img/mlk.jpg" alt="Background Image" class="home-img">
    </div>
</body>
</html>

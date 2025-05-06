
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <title>E-RESIT (pendaftaran AHLI)</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        /* Table */
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            background-color: #fff;
        }
        th, td {
            padding: 0.75rem;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        th {
            background-color: #f8f9fa;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tfoot td {
            font-weight: bold;
        }

        /* Button */
        .new-button-link {
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            cursor: pointer;
        }
        .new-button-link:hover {
            background-color: #0056b3;
        }

        /* Background */
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .background-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }

        /* Form Styles */
        .main-block {
            padding: 2rem;
            margin: 2rem auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            max-width: 1200px;
        }

        h1, h3 {
            color: #000;
        }

        fieldset {
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid #ddd;
        }

        label, input, select {
            display: block;
            width: 100%;
            margin-bottom: 0.75rem;
        }

        input[type="text"], select {
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="email"], select {
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Sidebar */
        nav.sidebar {
            background-color: #181818;
            padding: 1rem;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php include('sidebar.php'); ?>
    <main class="main">
        <div class="main-block">
            <form action="./printResit.php" method="POST">
                <h1>PENDAFTARAN RESIT AHLI</h1>

                <!-- Pengajar Details -->
                <fieldset>
                    <legend><h3>PENGAJAR</h3></legend>
                    <div>
                        <label>JABATAN*</label>
                        <select name="jabatan">
                            <option value=""></option>
                            <option value="mekanikal & pengeluaran">Mekanikal & Pengeluaran</option>
                            <option value="elektrik & elektrikal">Elektrik & Elektrikal</option>
                        </select>
                    </div>

                    <div>
                        <label>BAHAGIAN*</label>
                        <select name="bahagian">
                            <option value=""></option>
                            <option value="diploma teknologi pembuatan">Diploma Teknologi Pembuatan</option>
                            <option value="diploma teknologi automotif">Diploma Teknologi Automotif</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Maklumat AHLI -->
                <fieldset>
                    <legend><h3>MAKLUMAT AHLI</h3></legend>
                    <div>
                        <label>NAMA*</label>
                        <input type="text" name="name" required>
                    </div>
                    <div>
                        <label>EMAIL*</label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label>NO.NDP*</label>
                        <input type="text" name="ndp" required>
                    </div>
                    <div>
                        <label>SESI*</label>
                        <select name="sesi">
                            <option value=""></option>
                            <option value="2/23">1/24</option>
                            <option value="2/24">2/24</option>
                            <option value="2/24">1/25</option>
                            <option value="2/24">2/25</option>
                            <option value="2/24">1/24</option>
                            <option value="2/24">2/24</option>
                            <option value="2/24">1/24</option>
                        </select>
                    </div>
                    <div>
                        <label>SEMESTER*</label>
                        <select name="semester">
                            <option value=""></option>
                            <option value="Semester 1">Sem 1</option>
                            <option value="Semester 1">Sem 2</option>
                            <option value="Semester 1">Sem 3</option>
                            <option value="Semester 1">Sem 4</option>
                            <option value="Semester 1">Sem 5</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Resit Table -->
                <fieldset>
                    <legend><h3>RESIT</h3></legend>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Senarai Keperluan</th>
                                    <th>Harga (RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>
                                        <select name="ksk1">
                                            <option value="Senarai AHLI Latihan dan Asrama">Senarai AHLI Latihan & Asrama</option>
                                            <option value="-">-</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="total1">
                                            <option value="RM 451.00">RM 451.00</option>
                                            <option value="-">-</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>
                                        <select name="ksk2">
                                            <option value="Dobi + Buku Outing">Dobi + Buku Outing</option>
                                            <option value="-">-</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="total2">
                                            <option value="RM 81.00">RM 81.00</option>
                                            <option value="-">-</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>JUMLAH KESELURUHAN</td>
                                    <td>
                                        <select name="total">
                                        <option value="RM 532.00">RM 532.00</option>
                                    <option value="RM 451.00">RM 451.00</option>
                                    <option value="RM 81.00">RM 81.00</option>
                                            <option value="-">-</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-left">
                                        <button type="submit" class="new-button-link">Submit</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </fieldset>
            </form>
            <?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
        </div>
    </main>
    <script>
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

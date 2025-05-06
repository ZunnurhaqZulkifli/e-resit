<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN VISITOR ADTEC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Dark background */
            color: #e0e0e0; /* Light text for contrast */
        }

        .sidebar {
            width: 250px;
            background-color: #1e1e1e; /* Darker sidebar background */
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            color: #e0e0e0; /* Light text color */
        }

        main.main {
            margin-left: 270px;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #ffffff; /* White text */
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .tbl-header {
            background-color: #333333; /* Dark background for table header */
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        .tbl-header th {
            color: #ffffff; /* White text for table header */
            font-weight: bold;
            padding: 10px 15px;
        }

        .tbl-content {
            height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .tbl-content table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1e1e1e; /* Dark background for table */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 10px 10px;
        }

        .tbl-content table thead {
            visibility: collapse;
        }

        .tbl-content table tbody tr {
            border-bottom: 1px solid #444; /* Darker border color */
            transition: background-color 0.3s ease;
        }

        .tbl-content table tbody tr:hover {
            background-color: #333; /* Slightly lighter on hover */
        }

        .tbl-content table td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            color: #e0e0e0; /* Light text color */
        }

        .tbl-content::-webkit-scrollbar {
            width: 10px;
        }

        .tbl-content::-webkit-scrollbar-thumb {
            background-color: #444;
            border-radius: 10px;
        }

        @media screen and (max-width: 768px) {
            main.main {
                margin-left: 0;
                padding: 10px;
            }

            .tbl-header th,
            .tbl-content table td {
                font-size: 14px;
                padding: 8px;
            }

            .tbl-content {
                height: auto;
                overflow: auto;
            }
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.5; /* Slightly more visible background */
        }

        .background-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .print-button {
            background-color: #333333; /* Dark button background */
            color: #ffffff; /* White text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .print-button:hover {
            background-color: #555555; /* Slightly lighter on hover */
        }
    </style>
</head>

<body>
    <!-- Sidebar include -->
    <?php include('sidebar.php') ?>

    <!-- Main Content -->
    <main class="main">
        <section>
            <h1>SENARAI PELAJAR</h1>

            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>NAMA</th>
                            <th>SESI</th>
                            <th>SEMESTER</th>
                            <th>JABATAN</th>
                            <th>BAHAGIAN</th>
                            <th>SENARAI KEPERLUAN</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <form action="print_selected.php" method="POST">
                <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <?php
                            @include 'config.php';
                            $query = "SELECT * FROM `resit`";
                            $result = mysqli_query($conn, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="selected_ndp[]" value="<?php echo htmlspecialchars($row['ndp']); ?>"></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['sesi']); ?></td>
                                        <td><?php echo htmlspecialchars($row['semester']); ?></td>
                                        <td><?php echo htmlspecialchars($row['jabatan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['bahagian']); ?></td>
                                        <td><?php echo htmlspecialchars($row['ksk1']); ?>, <?php echo htmlspecialchars($row['ksk2']); ?></td>
                                        <td><?php echo htmlspecialchars($row['total']); ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="print-button">Print Selected</button>
            </form>
        </section>
    </main>

    <!-- Background Image -->
    <div class="background-image">
        <img src="img/mlk.jpg" alt="background image" class="home-img">
    </div>

</body>

</html>

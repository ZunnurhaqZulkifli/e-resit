<?php 
    include('./dbConnect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM resit WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Assigning database values to variables
    $jabatan = $row['jabatan'];
    $bahagian = $row['bahagian'];
    $name = $row['name'];
    $ndp = $row['ndp'];
    $sesi = $row['sesi'];
    $semester = $row['semester'];
    $ksk1 = $row['ksk1'];
    $ksk2 = $row['ksk2'];
    $total1 = $row['total1'];
    $total2 = $row['total2'];
    $total = $row['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resit Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            color: #333;
        }

        .receipt-container {
            width: 700px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 24px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot {
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
            }
            .receipt-container {
                box-shadow: none;
                border: none;
                width: 100%;
            }
            .footer {
                page-break-after: avoid;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-container">
        <h2>Resit Pendaftaran</h2>

        <div class="info">
            <p><strong>Nama: </strong><?php echo $name; ?></p>
            <p><strong>No. NDP: </strong><?php echo $ndp; ?></p>
            <p><strong>Sesi: </strong><?php echo $sesi; ?></p>
            <p><strong>Semester: </strong><?php echo $semester; ?></p>
        </div>

        <h3>Maklumat Pengajar</h3>
        <div class="info">
            <p><strong>Jabatan: </strong><?php echo $jabatan; ?></p>
            <p><strong>Bahagian: </strong><?php echo $bahagian; ?></p>
        </div>

        <h3>Resit</h3>
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
                    <td>1</td>
                    <td><?php echo $ksk1; ?></td>
                    <td>RM <?php echo$total1; ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><?php echo $ksk2; ?></td>
                    <td>RM <?php echo $total2; ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: right;">Jumlah Keseluruhan</td>
                    <td>RM <?php echo $total; ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>Terima kasih kerana mendaftar.</p>
            <p>Harap simpan resit ini untuk rujukan anda.</p>
        </div>
    </div>
</body>
</html>

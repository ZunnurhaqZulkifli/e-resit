<?php

    require __DIR__ . '/vendor/autoload.php';
    use App\Models\User;
    use App\Service\Auth;
    Auth::user();
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/css/main.css">
    <title>ADMIN VISITOR ADTEC</title>

    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                color: #000000;
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #4CAF50;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            .btn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .btn:hover {
                background-color: #45a049;
            }
            .container {
                padding: 20px;
                margin: 0 auto;
                max-width: 800px;
            }
            h1, h3 {
                color: #ffffff;
                font-weight: 200;
                word-spacing: 2px;
                text-align: center;
                letter-spacing: 1px;
            }
            h1 {
                margin-bottom: 20px;
            }
            .justify-content-center {
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: start;
                align-items: center;
            }
        </style>
    </head>

    <body>
        <?php include 'sidebar.php'; ?>
            <main class="main">
            <div class="main-block">
                <h1>Senarai Resit Anda</h1>
                <?php
                    if(User::find($user->id)->receipts() == null) {
                        echo "<p>Tiada resit untuk dipaparkan.</p>";
                    }
                ?>

                <div 
                    class="table-container"
                    style="
                        <?php
                            if(User::find($user->id)->receipts() == null) {
                                echo "display: none;";
                            }
                        ?>"
                    >
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tajuk</th>
                                <th>Tarikh Bayaran</th>
                                <th>Status</th>
                                <th>Amaun</th>
                                <th>Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $user     = User::find(Auth::user()->id);
                                $receipts = $user->receipts();
                                $totalAmount    = 0;

                                foreach ($receipts as $key => $receipt) {
                                    $key = $key + 1;
                                    $student = User::find($receipt->student_id)->name;
                                    $total   = number_format($receipt->total_amount, 2);
                                    $totalAmount += $receipt->total_amount;
                                    $status  = $receipt->status == 'paid' ? 'Telah Dibayar' : 'Belum Dibayar';
                                    echo "<tr>";
                                    echo "<td>{$key}</td>";
                                    echo "<td>{$receipt->id}</td>";
                                    echo "<td>{$student}</td>";
                                    echo "<td>{$receipt->section}</td>";
                                    echo "<td>{$receipt->paid_at}</td>";
                                    echo "<td>{$status}</td>";
                                    echo "<td>{$total}</td>";
                                    echo "<td>
                                        <form action='print_receipt.php' method='POST'>
                                            <input type='hidden' name='receipt_id' value='{$receipt->id}'>
                                            <button type='submit' class='btn'>
                                                <i class='fas fa-print'></i>
                                            </button>
                                        </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5">Jumlah Resit: <?= count($receipts) ?></td>
                                <td colspan="1">Jumlah Bayaran : </td>
                                <td colspan="2"><?= 'RM ' . number_format($totalAmount, 2) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </main>
        <script src="app/js/index.js"></script>
        <?php include 'footer.php'; ?>
            </div>
    </body>

</html>

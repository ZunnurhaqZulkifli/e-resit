<?php

require __DIR__ . '/vendor/autoload.php';
use App\Models\Receipt;
use App\Models\User;
use App\Models\Item;

$id = trim($_POST['receipt_id'] ?? "");

if($_SERVER["REQUEST_METHOD"] === "POST" && $id) {
    $receipt = Receipt::find($id);
    $items = Item::all();
    $receipt_items = $receipt->items();

    
    if($receipt->status == "pending") {
        $receipt = Receipt::find($id);
        $receipt->payment();
    }
    
} else {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/css/main.css">
    <title>Bayaran</title>
    
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .main, .main * {
                visibility: visible;
            }
            .main {
                position: absolute;
                left: 0;
                top: 0;
            }
            .sidebar {
                display: none;
            }
        }
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
        .main {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            <div class="container">
                <h1>Maklumat Resit</h1>

                <div class="justify-content-center">
                    <h3>
                        Rujukan
                    </h3>

                    <h3>
                        <?= ' : ' . $receipt->reference_number ?>
                    </h3>
                </div>

                <div class="justify-content-center">
                    <h3 class="">
                        Pelajar
                    </h3>
                    <h3>
                        <?= '  : ' . ucfirst(User::find($receipt->student_id)->name) ?>
                    </h3>
                </div>

                <div class="justify-content-center">
                    <h3>
                        Pengajar
                    </h3>

                    <h3>
                        <?= '  : ' . ucfirst(User::find($receipt->lecturer_id)->name) ?>
                    </h3>
                </div>

                <div class="justify-content-center">
                    <h3>
                        Jenis Bayaran
                    </h3>
                    <h3>
                        <?= '  : ' . $receipt->type ?>
                    </h3>
                </div>

                <div class="justify-content-center">
                    <h3>
                        Tarikh Bayaran : 
                    </h3>
                    <h3>
                        <?= ' ' . date('d-m-Y', strtotime($receipt->created_at)) ?>
                    </h3>
                </div>

                <div class="justify-content-center">
                    <h3>
                        Semester
                    </h3>
                    <h3>
                        <?= '  : ' . $receipt->semester ?>
                    </h3>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Nama Item</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($receipt_items as $index => $item): ?>
                            <tr>
                                <?php
                                    $itemx = Item::find($item->item_id);
                                ?>
                                <td><?= $index + 1 ?></td>
                                <td><?= $itemx->name; ?></td>
                                <td><?= number_format($itemx->amount, 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="2">Jumlah Keseluruhan</td>
                            <td> RM <?php echo number_format($receipt->total_amount, 2); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <h3>
                    Resit ini dijana secara automatik dan tidak memerlukan tandatangan.
                </h3>
                <br>
                <button class="btn" onclick="window.print()">
                    <i class="fa-solid fa-print"></i>
                    Cetak Resit
                </button>
            </div>
        </main>
    </body>
</html>
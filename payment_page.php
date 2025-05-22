<?php

require __DIR__ . '/vendor/autoload.php';
use App\Models\Receipt;
use App\Models\User;
use App\Models\Item;

$id = $_GET['id'] ?? null;

if($_SERVER["REQUEST_METHOD"] === "POST" && $id) {
    $receipt = Receipt::find($id);
    $items = Item::all();
    $receipt_items = $receipt->items();
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
            <div class="container">
                <h1>Bayaran</h1>
                <h3>
                    <?= 'Rujukan : ' . $receipt->reference_number ?>
                </h3>
                <h3>Maklumat Resit</h3>
                <h3>
                    <?= 'Pelajar : ' . ucfirst(User::find($receipt->student_id)->name) ?>
                </h3>
                <h3>
                    <?= 'Pengajar : ' . ucfirst(User::find($receipt->lecturer_id)->name) ?>
                </h3>
                <h3>
                    <?= 'Jenis Bayaran : ' . $receipt->type ?>
                </h3>
                <h3>
                    <?= 'Semester : ' . $receipt->semester ?>
                </h3>
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
                                <td ><?= $index + 1 ?></td>
                                <td ><?= $itemx->name; ?></td>
                                <td ><?= number_format($itemx->amount, 2); ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <h3>Jumlah Bayaran : <?= 'RM ' .  number_format($receipt->total_amount, 2) ?></h3>
                <h3>Belum Dibayar</h3>
                <br>
                <form action="print_receipt.php" method="POST">
                    <input type="hidden" name="receipt_id" value="<?= $id ?>">
                    <button class="btn" type="submit">Bayar</button>
                </form>
            </div>
        </main>
    </body>
</html>
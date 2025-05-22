<?php

require __DIR__ . '/vendor/autoload.php';
use App\Models\Receipt;
use App\Models\Item;

$id = $_GET['id'];

if($id) {
    $receipt = Receipt::find($id);
    $items = Item::all();
    $receipt_items = $receipt->items();
} else {
    header("Location: index.php");
}

$request_type = $_GET["request_type"] ?? null;

if($_SERVER["REQUEST_METHOD"] === "POST" && $request_type == "remove_item") {

    $r_id = $_GET['id'];
    $i_id = $_GET['r_item_id'];

    if($r_id && $i_id) {
        $data = [
            'receipt_id' => $r_id,
            'r_item_id'    => $i_id,
        ];

        $receipt->removeItem($data);

        header("Location: receipt_cart.php?id={$r_id}");
    }
}

if($_SERVER["REQUEST_METHOD"] === "POST" && $request_type == "add_item") {

    $r_id = $_GET['id'];
    $i_id = trim($_POST['item_id'] ?? "");

    if($r_id && $i_id) {
        $data = [
            'receipt_id' => $r_id,
            'item_id'    => $i_id,
        ];

        $receipt->addItem($data);

        header("Location: receipt_cart.php?id={$r_id}");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/css/main.css">
    <title>Tambah Bayaran</title>
</head>
    <body>
        <?php include 'sidebar.php'; ?>
        <main class="main">
            <div class="main-block">
                <h1>Tambah Bayaran</h1>
                <form action="receipt_cart.php?id=<?php echo($id) ?>&request_type=add_item" method="post">

                    <table style="width: 100%; border-collapse: collapse; ">
                        <thead>
                            <tr>
                                <th style="color:black">Id</th>
                                <th style="color:black">Nama</th>
                                <th style="color:black">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($receipt_items as $key => $item) {
                                $i = Item::find($item->item_id);
                                $a = $i->amount;
                                $key = $key + 1;
                                echo "<tr>";
                                echo "<td style=color:black>{$key}</td>";
                                echo "<td style=color:black>{$i->name}</td>";
                                echo "<td style=color:black>RM " . number_format($a, 2). "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td style="color:black" colspan="2">Jumlah Keseluruhan</td>
                                <td style="color:black" > RM <?php echo number_format($receipt->total_amount, 2); ?></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="data">
                        <label>Pilih Bayaran</label>
                        <select name="item_id" id="item_id" class="">
                            <?php 

                            foreach($items as $item) {
                                echo "<option value='{$item->id}'>{$item->name} | RM " . number_format($item->amount, 2). "</option>";
                            }
                        
                            ?>
                        </select>
                    </div>
                    <button class="btn" type="submit" name="submit">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Bayaran
                    </button>
                </form>

                <br>

                <div class="btn-group">
                    <form 
                        style="<?php 
                            if($receipt_items == null) {
                                echo "display: none;";
                            } else {
                                echo "";
                            }
                        ?>"
                        action="receipt_cart.php?id=<?php echo($id) ?>&request_type=remove_item&r_item_id=<?php echo($receipt_items[count($receipt_items) - 1]->id) ?>" 
                        method="post" 
                        onsubmit="return confirm('Adakah anda pasti untuk memadam resit ini?');
                        ">
                        <input 
                            type="text" 
                            name="r_item_id" 
                            id="r_item_id" 
                            value="<?php $receipt_items[count($receipt_items) - 1]->id ?>
                        " style="display: none;">
                        <button 
                            class="btn" 
                            value="submit
                            "> - Tolak Bayaran
                        </button>
                    </form>

                    <br>

                    <form 
                        action="payment_page.php?id=<?php echo($id) ?>" 
                        method="post"
                        onsubmit="return confirm('Adakah anda pasti untuk bayar resit ini?')"
                        >
                        <button class="btn" value="submit">Bayar</button>
                    </form>

                    <br>

                    <form action="index.php?id=<?php echo($id) ?>">
                        <button class="btn" value="submit">Kembali</button>
                    </form>
                </div>
            </div>
        </main>
         <script src="app/js/index.js"></script>
        <?php include 'footer.php'; ?>
    </body>
</html>
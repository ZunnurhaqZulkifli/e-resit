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
    <title>ADMIN VISITOR ADTEC</title>
    <link rel="stylesheet" href="app/css/main.css">
    <body>
    <?php include 'sidebar.php'; ?>
        <main class="main">
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
</body>

</html>

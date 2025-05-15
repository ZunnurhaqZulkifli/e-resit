<?php

print_r($_POST['ids']);

$id = $_POST['ids'];

if ($id) {

    // Redirect ke halaman mencetak.php dengan NDP yang dipilih
    header("Location: http://e-resit.test/mencetak.php?id=" . urlencode($id));
    exit(); // pastikan skrip dihentikan selepas pengalihan

} else {
    echo "Tiada pelajar dipilih.";
}
?>

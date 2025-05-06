<?php
if (isset($_POST['selected_ndp'])) {
    $selected_ndp = $_POST['selected_ndp'];

    // Jika hanya satu pelajar dipilih
    if (count($selected_ndp) == 1) {
        $ndp = $selected_ndp[0];

        // Redirect ke halaman mencetak.php dengan NDP yang dipilih
        header("Location: http://e-resit.test/mencetak.php?ndp=" . urlencode($ndp));
        exit(); // pastikan skrip dihentikan selepas pengalihan
    } else {
        // Jika lebih dari satu pelajar dipilih, berikan amaran kepada pengguna
        echo "Sila pilih hanya satu pelajar untuk mencetak.";
    }
} else {
    echo "Tiada pelajar dipilih.";
}
?>

<?php
@include 'config.php';

if (isset($_POST['selected_ndp'])) {
    $selected_ndp = $_POST['selected_ndp'];

    foreach ($selected_ndp as $ndp) {
        // Hapuskan pelajar berdasarkan ndp
        $query = "DELETE FROM `resit` WHERE `ndp` = '$ndp'";
        mysqli_query($conn, $query);
    }

    // Redirect ke halaman asal selepas delete
    header("Location: paparresit.php");
    exit();
}
?>

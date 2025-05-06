<?php
$conn = mysqli_connect('localhost', 'root', '', 'deploy_resit');
if (!$conn) {
    die('connect ke database gagal: ' . mysqli_connect_error());
}

?>
<!-- Get-Content "C:\Users\Administrator\development\e-resit\database\deploy_resit.sql" | mysql -u root deploy_resit  -->
<?php
$conn = mysqli_connect('localhost', 'root', '', 'deploy_resit');
if (!$conn) {
    die('connect ke database gagal: ' . mysqli_connect_error());
}

?>
<!-- mysql -u root deploy_resit < C:/Users/Administrator/development/e-resit/database\ file/deploy_resit.sql  -->
<?php
$conn = mysqli_connect('localhost', 'root', '', 'deploy_resit');
if (!$conn) {
    die('connect ke database gagal: ' . mysqli_connect_error());
}

?>
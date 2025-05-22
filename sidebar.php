<?php

  require __DIR__ . '/vendor/autoload.php';
  use App\Service\Auth;
  $user = Auth::user();
  $page = basename($_SERVER['SCRIPT_FILENAME']);
  $style = 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;';
  
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Honkers Fest</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="app/css/sidebar.css" />
  </head>
  <body>
    <nav class="sidebar">
      <div class="menu-content">
        <div class="menu-title">E-Kewangan KSK</div>
        <ul class="menu-items">
          <li class="item" style="
            <?php if ($page === 'main.php') { echo $style; } ?>
          ">
            <a href="main.php"><i class="fa-solid fa-house"></i>Home</a>
          </li>
          <li class="item" style="
            <?php 
              if ($user->role === 'admin' || $user->role === 'student') { 
                if ($page === 'student_reciept.php') { echo $style; }
                if ($page === 'receipt_cart.php') { echo $style; }
                if ($page === 'payment_page.php') { echo $style; }
                if ($page === 'print_receipt.php') { echo $style; }
              } else {
                echo 'display: none;';
              } 
            ?>
            
          ">
            <a href="student_reciept.php"><i class="fa-solid fa-receipt"></i>Cipta / Bayar Resit</a>
          </li>
          <li class="item" style="
            <?php 
              if ($user->role === 'admin' || $user->role === 'student' || $user->role === 'lecturer') { 
                if ($page === 'student_lists.php') { echo $style; }
              } else {
                echo 'display: none;';
              } 
            ?>
          ">
            <a href="student_lists.php"><i class="fa-solid fa-users-line"></i>Senarai Resit Pelajar</a>
          </li>
          
          <!-- <li class="item" style="
            <?php 
              if ($user->role === 'admin' || $user->role === 'member') { 
                if ($page === 'member_receipt.php') { echo $style; }
              } else {
                echo 'display: none;';
              } 
            ?>
          ">
            <a href="member_receipt.php"><i class="fa-solid fa-receipt"></i>Resit Ahli</a>
          </li>
          <li class="item" style="
            <?php 
              if ($user->role === 'admin' || $user->role === 'member' || $user->role === 'lecturer') {
                if ($page === 'member-lists.php') { echo $style; }
              } else {
                echo 'display: none;';
              } 
            ?>
          ">
            <a href="student_lists.php"><i class="fa-solid fa-users"></i>Senarai Resit Ahli</a>
          </li> -->
          <li class="item">
            <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>
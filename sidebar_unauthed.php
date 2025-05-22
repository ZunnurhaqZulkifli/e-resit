<?php

  $page = basename($_SERVER['SCRIPT_FILENAME']);
  $style = 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;';
?>

<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-RESIT (pendaftaran pelajar)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="app/css/sidebar.css" />
  </head>
  <body>
    <nav class="sidebar">
      <div class="menu-content">
        <div class="menu-title">E-Kewangan KSK</div>
        <ul class="menu-items">
          <li class="item" style="
            <?php if ($page === 'login_page.php' || $page === 'register_page_2.php') { echo $style; } ?>
          ">
            <a href="login_page.php"><i class="fa-solid fa-circle-user"></i>Log Masuk</a>
          </li>
          <li class="item" style="
            <?php if ($page === 'about_us.php') { echo $style; } ?>
          ">
            <a href="about_us.php"><i class="fa-solid fa-circle-info"></i>Tentang Kami</a>
          </li>
          <li class="item" style="
            <?php if ($page === 'register_page.php') { echo $style; } ?>
          ">
            <a href="register_page.php"><i class="fa-solid fa-circle-info"></i>Daftar Akaun</a>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>

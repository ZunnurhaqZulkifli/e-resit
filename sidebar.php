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
            <?php if (basename($_SERVER['SCRIPT_FILENAME']) === 'main.php') { echo 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;'; } ?>
          ">
            <a href="main.php"><i class="fa-solid fa-house"></i>Home</a>
          </li>
          <li class="item" style="
            <?php if (basename($_SERVER['SCRIPT_FILENAME']) === 'student_reciept.php') { echo 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;'; } ?>
          ">
            <a href="student_reciept.php"><i class="fa-solid fa-receipt"></i>Resit Pelajar</a>
          </li>
          <li class="item" style="
            <?php if (basename($_SERVER['SCRIPT_FILENAME']) === 'member_receipt.php') { echo 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;'; } ?>
          ">
            <a href="member_receipt.php"><i class="fa-solid fa-receipt"></i>Resit Ahli</a>
          </li>
          <li class="item" style="
            <?php if (basename($_SERVER['SCRIPT_FILENAME']) === 'member-lists.php') { echo 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;'; } ?>
          ">
            <a href="student_lists.php"><i class="fa-solid fa-users"></i>Senarai Ahli</a>
          </li>
          <li class="item" style="
            <?php if (basename($_SERVER['SCRIPT_FILENAME']) === 'student_lists.php') { echo 'background-color: rgba(255, 0, 200, 0.77); color: #fff; border-radius: 50px;'; } ?>
          ">
            <a href="student_lists.php"><i class="fa-solid fa-users-line"></i>Senarai Pelajar</a>
          </li>
          <li class="item">
            <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>

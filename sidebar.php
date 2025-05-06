<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-RESIT (pendaftaran pelajar)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      .sidebar {
        position: fixed;
        width: 250px;
        height: 100%;
        background-color: #181818; /* Dark sidebar */
        color: #fff;
        transition: width 0.4s ease; /* Smooth transition */
      }

      .sidebar:hover {
        width: 300px; /* Expand on hover */
      }

      .menu-content {
        padding: 20px;
        display: flex;
        flex-direction: column;
      }

      .menu-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #fff;
        margin-bottom: 1rem;
      }

      .menu-items {
        list-style-type: none;
        padding: 0;
      }

      .menu-items .item {
        margin: 15px 0;
      }

      .menu-items .item a {
        text-decoration: none;
        color: #ccc;
        font-size: 1rem;
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .menu-items .item a:hover {
        background-color: #333;
        color: #fff;
      }

      .menu-items .item a i {
        margin-right: 10px;
      }

      /* Optional: Add some shadow for a more modern feel */
      .sidebar {
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.5);
      }

      /* Add a smooth opening animation */
      .sidebar {
        animation: slideIn 0.5s forwards;
      }

      @keyframes slideIn {
        from {
          width: 0;
        }
        to {
          width: 250px;
        }
      }
    </style>
  </head>
  <body>
    <nav class="sidebar">
      <div class="menu-content">
        <div class="menu-title">KAUNTERR PENDAFTARAN</div>
        <ul class="menu-items">
          <li class="item">
            <a href="resit.php"><i class="fas fa-file-alt"></i> RESIT PELAJAR</a>
          </li>
          <li class="item">
            <a href="resit_ahli.php"><i class="fas fa-file-alt"></i> RESIT AHLI</a>
          </li>
          <li class="item">
            <a href="paparresit.php"><i class="fas fa-list"></i> Senarai Ahli</a>
          </li>
          <li class="item">
            <a href="paparresit.php"><i class="fas fa-list"></i> Senarai Pelajar</a>
          </li>
          <li class="item">
            <a href="tentangkami.php"><i class="fas fa-info-circle"></i> Tentang Kami</a>
          </li>
          <li class="item">
            <a href="index.php"><i class="fas fa-sign-out-alt"></i> LOG KELUAR</a>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - E-Resit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212; /* Dark background for the page */
            color: #e0e0e0; /* Light text color for contrast */
            display: flex;
            height: 100vh;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #1e1e1e; /* Dark gray background for the sidebar */
            color: #e0e0e0;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Enhanced shadow for depth */
        }

        .sidebar h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
            color: #ffffff;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 20px;
        }

        .sidebar ul li a {
            color: #e0e0e0;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #333333; /* Darker gray on hover */
            color: #ffffff;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar .logout {
            text-align: center;
            font-size: 16px;
            background-color: #e74c3c;
            padding: 10px;
            border-radius: 8px;
            color: white;
            transition: background-color 0.3s ease;
        }

        .sidebar .logout:hover {
            background-color: #c0392b;
        }

        /* Main content styling */
        .main {
            margin-left: 250px;
            padding: 50px;
            width: calc(100% - 250px);
            background-color: #121212; /* Match the dark theme */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .main h1 {
            font-size: 38px;
            color: #00bcd4; /* Cyan color for the heading */
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Slightly darker shadow */
        }

        .main p {
            font-size: 18px;
            color: #b0bec5; /* Light gray color for the text */
        }

        .main .button {
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #00bcd4; /* Cyan color for the button */
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .main .button:hover {
            background-color: #008ba3; /* Darker cyan on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        /* Responsive sidebar for mobile */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Menu -->
    <?php include('sidebar.php'); ?>

    <!-- Main Content -->
<main class="main">
    <h1>SELAMAT DATANG KE SISTEM E-KEWANGAN AHLI & PELAJAR ADTEC MELAKA</h1>
    <p>Sistem ini membantu menguruskan resit pembayaran pelajar secara efisien dan mudah digunakan.</p>
    <a href="resit.php" class="button">Get Started</a>
</main>


    <script src="js/index.js"></script>
</body>
</html>

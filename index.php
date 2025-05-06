<?php
@include 'config.php';

$message = ""; // Initialize the message variable

if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $ajk = isset($_POST['ajk']) ? mysqli_real_escape_string($conn, $_POST['ajk']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

    // Query to insert data into the AJK table
    $insert = "INSERT INTO `ajk` (name, ajk, password) VALUES ('$name', '$ajk', '$password')";

    if (mysqli_query($conn, $insert)) {
        echo "<script>alert('Berjaya masuk.');</script>";
        header('location: main.php');
        exit();
    } else {
        echo "Tidak Dibenarkan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJK Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        /* Reset basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
         
            font-family: 'Poppins', sans-serif;
            background: #1b1b1b; /* Dark background for aesthetic */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(0, 0, 0, 0.7); /* Transparent black background */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            backdrop-filter: blur(10px); /* Blur effect */
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeIn 1s ease-in-out; /* Animation for the form */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .text {
            font-size: 2rem;
            color: #fff;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .data {
            margin-bottom: 20px;
            position: relative;
        }

        .data input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: background 0.3s ease;
        }

        .data input:focus {
            background: rgba(255, 255, 255, 0.4);
            outline: none;
        }

        .data label {
            font-size: 0.9rem;
            color: #fff;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-3px); /* Hover effect */
        }

        .container .fas.fa-times {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.5rem;
            color: #fff;
            cursor: pointer;
        }

        .container .fas.fa-times:hover {
            color: #ff4d4d;
        }

        .message {
            color: red;
            font-size: 0.9rem;
            margin-top: 15px;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <label class="fas fa-times" title="close"></label>
        <div class="text">Login AJK</div>
        <form action="" method="POST">
            <div class="data">
                <label>Nama AJK</label>
                <input type="text" name="name" required>
            </div>
            <div class="data">
                <label>ID AJK</label>
                <input type="text" name="ajk" required>
            </div>
            <div class="data">
                <label>Kata Laluan</label>
                <input type="password" name="password" required>
            </div>
            <button class="btn" type="submit" name="submit">Log Masuk</button>
        </form>
        <?php if (!empty($message)) : ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

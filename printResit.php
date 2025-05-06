<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';


    include_once("./config.php");
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan'] ?? '');
    $bahagian = mysqli_real_escape_string($conn, $_POST['bahagian'] ?? '');
    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $ndp = mysqli_real_escape_string($conn, $_POST['ndp'] ?? '');
    $sesi = mysqli_real_escape_string($conn, $_POST['sesi'] ?? '');
    $semester = mysqli_real_escape_string($conn, $_POST['semester'] ?? '');
    $ksk1 = mysqli_real_escape_string($conn, $_POST['ksk1'] ?? '');
    $ksk2 = mysqli_real_escape_string($conn, $_POST['ksk2'] ?? '');
    $total1 = mysqli_real_escape_string($conn, $_POST['total1'] ?? '');
    $total2 = mysqli_real_escape_string($conn, $_POST['total2'] ?? '');
    $total = mysqli_real_escape_string($conn, $_POST['total'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');

    $select = "SELECT * FROM `resit` WHERE ndp = '$ndp'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $message = "Receipt with the same NDP already exists.";
    } else {
        $insert = "INSERT INTO `resit` (jabatan, bahagian, name, ndp, sesi, semester, ksk1, ksk2, total1, total2, total) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssssss", $jabatan, $bahagian, $name, $ndp, $sesi, $semester, $ksk1, $ksk2, $total1, $total2, $total);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $inserted_id = mysqli_insert_id($conn);
                $message = "Receipt successfully saved.";
                
                $mail = new PHPMailer(); $mail->IsSMTP(); $mail->Mailer = "smtp";
                $mail->SMTPDebug  = 1;  
                $mail->SMTPAuth   = TRUE;
                $mail->SMTPSecure = "tls";
                $mail->Port       = 587;
                $mail->Host       = "smtp.gmail.com";
                $mail->Username   = "nazrinshaah@gmail.com";
                $mail->Password   = "uvwh dbfv fpiy khrj";
                $mail->IsHTML(true);
                $mail->AddAddress("$email", "$name");
                $mail->SetFrom("nazrinshaah@gmail.com", "Resit Sistem");
                $mail->AddReplyTo("nazrinshaah@gmail.com", "reply-to-name");

                $mail->Subject = "Resit Pendaftaran";
                $content = "
                                <h2>Resit Pendaftaran</h2>
                                <p><strong>Nama: </strong>$name</p>
                                <p><strong>No. NDP: </strong>$ndp</p>
                                <p><strong>Sesi: </strong>$sesi</p>
                                <p><strong>Semester: </strong>$semester</p>

                                <h3>Maklumat Pengajar</h3>
                                <p><strong>Jabatan: </strong>$jabatan</p>
                                <p><strong>Bahagian: </strong>$bahagian</p>

                                <h3>Resit</h3>
                                <table border='1' cellpadding='5' cellspacing='0'>
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Senarai Keperluan</th>
                                            <th>Harga (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>$ksk1</td>
                                            <td>$total1</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>$ksk2</td>
                                            <td>$total2</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan='2' style='text-align: right;'><strong>Jumlah Keseluruhan</strong></td>
                                            <td><strong>$total</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                ";

                $mail->MsgHTML($content); 
                if(!$mail->Send()) {
                    echo "
                        <script type='text/javascript'>
                        alert('Error Send Email');
                        history.back();
                            </script>";
                } else {
                   
                    echo "
                        <script type='text/javascript'>
                        alert('$message and send to you Email');
                         window.location.href ='resitPdf.php?id=$inserted_id';
                            </script>";
                }
                // header('Location: prin.php');
                // exit();
            } else {
                $message = "Receipt could not be saved.";
                echo "
                <script type='text/javascript'>
                alert('$message');
                history.back();
                    </script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            $message = "Error in prepared statement: " . mysqli_error($conn);
        }
    }
    echo $message;
?>
<!-- majicdiscord@gmail.com -->
<!-- qwwq ghzr soca hovf  -->
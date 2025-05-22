<?php
require __DIR__ . '/vendor/autoload.php';

use App\Enums\ReceiptStatus;
use App\Service\Auth;
use App\Models\Receipt;
use App\Models\User;

$student_id;
$lecturer_id;
$type;
$semester;
$sections;
$status;
$total_amount;

 if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $student = Auth::user();
    $student_id   = $student->id;
    $lecturer_id  = trim($_POST['lecturer_id'] ?? "");

    $lecturer     = User::find($lecturer_id)->profile($lecturer_id);
    $type         = $student->role == "student" ? "payment" : "membership";
    $semester     = $student->profile($student_id)->semester;
    $session      = $student->profile($student_id)->session;
    $section      = $lecturer->section;
    $department   = $lecturer->department;
    $status       = ReceiptStatus::PENDING;

    if($student_id && $lecturer_id) {

        $data = [
            'student_id'   => $student_id,
            'lecturer_id'  => $lecturer_id,
            'type'         => $type,
            'department'   => $department,
            'section'      => $section,
            'semester'     => $semester,
            'session'      => $session,
            'status'       => $status,
            'total_amount' => 0,
        ];

        $receipt = Receipt::save($data);

        if($receipt) {
            header("Location: receipt_cart.php?id={$receipt}");
        }
    }
 }
?>

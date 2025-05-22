<?php

namespace App\Models;

use App\Service\Config;
use App\Models\ReceiptItem;

class Receipt
{
    public $id;
    public $student_id;
    public $lecturer_id;
    public $type;
    public $section;
    public $session;
    public $semester;
    public $department;
    public $reference_number;
    public $status;
    public $total_amount;
    public $created_at;
    public $paid_at;

    public function __construct()
    {
        //
    }

    public static function find($id)
    {
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM receipts WHERE id = '$id'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $receipt = new Receipt();
            $receipt->setReceipt($row);
            return $receipt;
        }

        return null;
    }

    public function setReceipt($data)
    {
        $this->id               = $data['id'];
        $this->student_id       = $data['student_id'];
        $this->lecturer_id      = $data['lecturer_id'];
        $this->type             = $data['type'];
        $this->section          = $data['section'];
        $this->session          = $data['session'];
        $this->semester         = $data['semester'];
        $this->department       = $data['department'];
        $this->reference_number = $data['reference_number'];
        $this->status           = $data['status'];
        $this->total_amount     = $data['total_amount'];
        $this->created_at       = $data['created_at'];
        $this->paid_at          = $data['paid_at'];
        return $this;
    }

    public static function save(array $data)
    {
        $config = new Config();
        $query = $config->conn;
        
        $student_id       = $data['student_id'];
        $lecturer_id      = $data['lecturer_id'];
        $type             = $data['type'];
        $department       = $data['department'];
        $section          = $data['section'];
        $semester         = $data['semester'];
        $session          = $data['session'];
        $status           = $data['status'];
        $total_amount     = 0;
        
        if($student_id && $lecturer_id && $status) {
            $insertx = "INSERT INTO receipts (student_id, lecturer_id, type, semester, section, status, total_amount, session, department) VALUES ('$student_id', '$lecturer_id', '$type', '$semester', '$section', '$status', '$total_amount', '$session', '$department')";
            $result = mysqli_query($query, $insertx);

            $queryx = "SELECT id FROM receipts WHERE student_id = '$student_id' AND lecturer_id = '$lecturer_id' AND type = '$type' AND semester = '$semester' AND section = '$section' AND status = '$status' AND session = '$session' AND department = '$department' ORDER BY id DESC LIMIT 1";
            $resultx = mysqli_query($query, $queryx);

            return mysqli_fetch_array($resultx)['id'] ?? null;
        }
    }

    public function items()
    {
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM receipt_items WHERE receipt_id = '$this->id'";
        $result = mysqli_query($query, $select);
        $items = [];

        if ($result) {
            foreach ($result as $row) {
                $item = new ReceiptItem();
                $item->setItem($row);
                if ($item) {
                    $items[] = $item;
                }
            }
        }

        return $items;
    }

    public function addItem($data)
    {
        $config = new Config();
        $query = $config->conn;

        $receipt_id = $data['receipt_id'];
        $item_id = $data['item_id'];

        $insert = "INSERT INTO receipt_items (receipt_id, item_id) VALUES ('$receipt_id', '$item_id')";
        mysqli_query($query, $insert);

        $this->updateTotalAmount();
    }

    public function removeItem($data)
    {
        $config = new Config();
        $query = $config->conn;

        $receipt_id = $data['receipt_id'];
        $r_item_id = $data['r_item_id'];

        $delete = "DELETE FROM receipt_items WHERE receipt_id = '$receipt_id' AND id = '$r_item_id'";
        mysqli_query($query, $delete);

        $this->updateTotalAmount();
    }

    public function updateTotalAmount()
    {
        $items = $this->items();
        $total = 0;

        foreach ($items as $item) {
            $total += Item::find($item->item_id)->amount;
        }

        $config = new Config();
        $query = $config->conn;

        $update = "UPDATE receipts SET total_amount = '$total' WHERE id = '$this->id'";
        mysqli_query($query, $update);
    }

    public function payment()
    {
        $config = new Config();
        $query = $config->conn;

        $update = "UPDATE receipts SET status = 'paid', paid_at = NOW() WHERE id = '$this->id'";
        mysqli_query($query, $update);
    }
}

?>
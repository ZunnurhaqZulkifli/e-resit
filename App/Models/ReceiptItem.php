<?php

namespace App\Models;

use App\Service\Config;

class ReceiptItem
{
    public $id;
    public $item_id;
    public $receipt_id;

    public function __construct()
    {
        //
    }

    public static function find($id)
    {
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM receipt_items WHERE id = '$id'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $item = new ReceiptItem();
            $item->setItem($row);
            return $item;
        }

        return null;
    }

    public function setItem($data)
    {
        $this->id       = $data['id'];
        $this->item_id = $data['item_id'];
        $this->receipt_id     = $data['receipt_id'];

        return $this;
    }
}

?>
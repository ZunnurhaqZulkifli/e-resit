<?php

namespace App\Models;

use App\Service\Config;

class Item
{
    public $id;
    public $name;
    public $category;
    public $amount;

    public function __construct()
    {
        //
    }

    public static function find($id)
    {
        $config = new Config();
        $query = $config->conn;

        $select = "SELECT * FROM items WHERE id = '$id'";
        $result = mysqli_query($query, $select);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $item = new Item();
            $item->setItem($row);
            return $item;
        }

        return null;
    }

    public function setItem($data)
    {
        $this->id       = $data['id'];
        $this->category = $data['category'];
        $this->name     = $data['name'];
        $this->amount   = $data['amount'];

        return $this;
    }

    public static function save(array $data)
    {
        $config = new Config();
        $query  = $config->conn;
        
        $category = $data['category'];
        $name     = $data['name'];
        
        if($category && $name) {
            $insertx = "INSERT INTO items (name, category) VALUES ('$name', '$category')";
            $result  = mysqli_query($query, $insertx);

            $queryx  = "SELECT id FROM items WHERE name = '$name' AND category = '$category' ORDER BY id DESC LIMIT 1";
            $resultx = mysqli_query($query, $queryx);

            return mysqli_fetch_array($resultx)['id'] ?? null;
        }
    }

    public static function all()
    {
        $config = new Config();
        $query  = $config->conn;

        $select = "SELECT * FROM items";
        $result = mysqli_query($query, $select);
        $rows   = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($rows) {
            foreach ($rows as $row) {
                $item = new Item();
                $item->setItem($row);
                $items[] = $item;
            }
        }

        return $items ?? [];
    }
}

?>
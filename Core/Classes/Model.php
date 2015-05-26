<?php
namespace App\Classes;


class Model
{
    public function all()
    {
        $result = DB::query("SELECT * FROM ".$this->table);
        $return_arr = [];
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                array_push($return_arr, $row);
            }
        }

        return $return_arr;
    }

    public function find($id)
    {
        $result = DB::query("SELECT * FROM ".$this->table." WHERE id = " . $id);

        return $result;
    }
}
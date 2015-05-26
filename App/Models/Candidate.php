<?php
namespace App\Models;

use App\Classes\DB;

class Job
{
    public function showAll()
    {
        $result = DB::query("SELECT * FROM jobs");
        $return_arr = [];
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                array_push($return_arr, $row);
            }
        }
        return $return_arr;
    }
}

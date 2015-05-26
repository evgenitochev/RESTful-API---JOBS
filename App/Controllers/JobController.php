<?php
namespace App\Controllers;

use App\Classes\DB;

class JobController
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

        return json_encode($return_arr);
    }

    public function show($params)
    {
        $result = DB::query("SELECT * FROM jobs WHERE id = " . $params['id']);

        return json_encode($result->fetch_assoc());
    }
}
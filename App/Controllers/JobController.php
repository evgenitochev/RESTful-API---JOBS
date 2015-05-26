<?php
namespace App\Controllers;
use App\Classes\DB;
use App\Models\Job;

class JobController
{
    public function showAll()
    {
        $job = new Job();
        $result = $job->showAll();

        return json_encode($result);
    }

    public function show($params)
    {
        $result = DB::query("SELECT * FROM jobs WHERE id = " . $params['id']);

        return json_encode($result->fetch_assoc());
    }
}
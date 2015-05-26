<?php
namespace App\Controllers;

use App\Classes\DB;
use App\Models\Job;

class JobController
{
    private $job = null;

    public function __construct()
    {
        if ($this->job == null) {
            $this->job = new Job();
        }
    }

    public function showAll()
    {
        $result = $this->job->all();

        return json_encode($result);
    }

    public function show($params)
    {

        $result = $this->job->find($params['id']);
        return json_encode($result->fetch_assoc());
    }
}
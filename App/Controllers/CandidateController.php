<?php


namespace App\Controllers;


use App\Models\Candidate;

class CandidateController
{

    private $candidate = null;

    public function __construct()
    {
        if ($this->candidate == null) {
            $this->candidate = new Candidate();
        }
    }

    public function showAll()
    {
        $result = $this->candidate->all();

        return json_encode($result);
    }

    public function review($params)
    {
        $result = $this->candidate->find($params['id']);

        return json_encode($result->fetch_assoc());
    }

    public function search($params)
    {
        $result = $this->candidate->find($params['id']);
        $res = $result->fetch_assoc();
        if ($res != null) {
            return json_encode($res);
        } else {
            return "Not found";
        }
    }


}

<?php

namespace App\Models;

use App\Service\Config;
use App\Service\Auth;

class Profile
{
    public $id;
    public $user_id;
    public $id_number;
    public $dob;
    public $address;
    public $phone;
    public $child_count;
    public $job_title;
    public $semester;
    public $session;
    public $department;
    public $section;

    public function __construct()
    {
        //
    }

    public function setProfile($row)
    {
        $this->id          = $row['id'];
        $this->user_id     = $row['user_id'];
        $this->id_number   = $row['id_number'];
        $this->dob         = $row['dob'];
        $this->address     = $row['address'];
        $this->phone       = $row['phone'];
        $this->child_count = $row['child_count'];
        $this->job_title   = $row['job_title'];
        $this->semester    = $row['semester'];
        $this->session     = $row['session'];
        $this->department  = $row['department'];
        $this->section     = $row['section'];
    }
}
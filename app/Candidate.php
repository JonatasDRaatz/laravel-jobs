<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
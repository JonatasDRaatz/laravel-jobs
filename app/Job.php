<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable =  [ 
        'title',
        'section_id',
        'admin_id',
        'description'
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function admin()
    {
        return $this->belongTo('App\Admin');
    }

    public function candidate()
    {
        return $this->hasMany('App\Candidate');
    } 
}

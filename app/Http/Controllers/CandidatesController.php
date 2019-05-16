<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Candidate;
use App\Job;

class CandidatesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Candidates($id)
    {
        $job = Job::find($id);
        $candidates = Candidate::where('job_id','=', $id)->get();
        return view('candidates.candidates-admin')->with([ 'job'=> $job, 'candidates'=>$candidates ]);
    } 
}

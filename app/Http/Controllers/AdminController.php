<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use App\User;
use App\Candidate;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::all()->count();
        $users = User::all()->count();
        $candidates = Candidate::all()->count();
         
        return view('admin.index')->with(['jobs' => $jobs, 'users' => $users, 'candidates' => $candidates]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Job;
use App\Candidate;
use App\Profile;
use Auth;
 

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'job']]);
    }
     
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::all();

        return view('home')->with( 'jobs', $jobs );
    }

    public function job(Request $request,$id)
    {
        $job  = Job::find($id);

        $request->session()->put('job', $id);

        return view('job')->with('job', $job);
    }

    public function create_candidate(Request $request)
    {
        $user_id = Auth::user()->id;
    
        $profile = DB::table('profiles')->where('user_id', $user_id)->first(); 


        $job =  $request->session()->get('job');

        $candidates = Candidate::where('job_id','=', $job)
                                ->where('profile_id','=', $profile->id)
                                ->count();
 
        if($candidates > 0){ 
            return redirect(route('home'))->with('error', 'Voce já está concorrendo para essa vaga!');
        }else{

            $candidate = new Candidate;
            $candidate->profile_id = $profile->id;
            $candidate->job_id = $job; 
            $candidate->save();

            return redirect(route('home'))->with('success', 'Cadastro realizdo. Boa sorte!');
        } 
    }
}

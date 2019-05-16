<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
use App\Section;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at','desc')->paginate(6);
        return view('jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('jobs.create')->with('sections', $sections); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'section_id' => 'required',
            'description' => 'required'
        ]);

        $job = new Job;
        $job->title = $request->input('title');
        $job->section_id = $request->input('section_id');
        $job->admin_id = Auth::user()->id;
        $job->description = $request->input('description'); 
        $job->save();
       
        return redirect(route('jobs.index'))->with('success', 'Nova vaga cadastrada com sucesso!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
       
        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        $sections = Section::all();
        return view('jobs.edit')->with([ 'job'=> $job, 'sections'=>$sections ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'section_id' => 'required',
            'description' => 'required'
        ]);

        $job = Job::find($id);
        $job->title = $request->input('title');
        $job->section_id = $request->input('section_id');
        $job->admin_id = Auth::user()->id;
        $job->description = $request->input('description'); 
        $job->save();

        return redirect(route('jobs.index'))->with('success', 'Vaga atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $job = Job::find($id);
        $job->delete();

        return redirect(route('jobs.index'))->with('success', 'Vaga deletada com sucesso!');
    }
}

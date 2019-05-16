<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;

class SectionsController extends Controller
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
        $sections = Section::orderBy('created_at','desc')->paginate(6);
        return view('sections.index')->with('sections', $sections);
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
        ]);

        $section = new Section;
        $section->title = $request->input('title');
        $section->save();

        return redirect(route('sections.index'))->with('success', 'Novo setor cadastrado com sucesso!');  
        
    }
 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $section = Section::find($id);
        return view('sections.edit')->with('section', $section);
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
        ]);

        $section = Section::find($id);
        $section->title = $request->input('title');
        $section->save();

        return redirect(route('sections.index'))->with('success', 'Setor alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        return redirect(route('sections.index'))->with('success', 'Setor deletado com sucesso!');
    }
}

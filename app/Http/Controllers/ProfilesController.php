<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facades\Storage;
 

use Auth;
use App\Profile;
use App\User;
use App\Candidate;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = Auth::user()->id; 

        $profiles = Profile::where('user_id','=', $user_id)->get();
         

        return view('profiles.index')->with( 'profiles', $profiles );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
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
            'name'  => 'required',
            'last_name' => 'required',
            'description' => 'required',
            'picture' => 'image|required|max:1999',
            'file' => 'file|required'  
        ]);

        //Files Upload
        
        //Full Name
        $fileNameExt    = $request->file('file')->getClientOriginalName();
        $pictureNameExt = $request->file('picture')->getClientOriginalName();
        
        //Just Name
        $fileName       = pathinfo($fileNameExt, PATHINFO_FILENAME);
        $pictureName    = pathinfo($pictureNameExt, PATHINFO_FILENAME);

        //Just Ext
        $extensionFile      = $request->file('file')->getClientOriginalExtension();
        $extensionPicture   = $request->file('picture')->getClientOriginalExtension();
        
        //Name to store
        $fileNameToStore    = $fileName.'_'.time().'.'.$extensionFile;
        $pictureNameToStore = $pictureName.'_'.time().'.'.$extensionPicture;
        
        $pathFile       = $request->file('file')->storeAs('public/files', $fileNameToStore);
        $pathPicture    = $request->file('picture')->storeAs('public/pictures', $pictureNameToStore);
            
         
        
        $profile = new Profile;
        $profile->name = $request->input('name');
        $profile->last_name = $request->input('last_name'); 
        $profile->description = $request->input('description'); 
        $profile->user_id = Auth::user()->id;
        $profile->file = $fileNameToStore;
        $profile->picture = $pictureNameToStore;
        $profile->save();
        
        return redirect(route('profiles.index'))->with('success', 'Perfil Cadastrado!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $profile = Profile::find($id);
  
        if(auth()->user()->id !== $profile->user_id){
            return redirect(route('home'));
        }
         
        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);

        if(auth()->user()->id !== $profile->user_id){
            return redirect(route('home'));
        }

        return view('profiles.edit')->with('profile', $profile);
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
            'name'  => 'required',
            'last_name' => 'required',
            'description' => 'required',  
        ]);

        $profile = new Profile;
        
        if($request->hasFile('picture')){

            $pictureNameExt = $request->file('picture')->getClientOriginalName();
            
            $pictureName    = pathinfo($pictureNameExt, PATHINFO_FILENAME);
            
            $extensionPicture   = $request->file('picture')->getClientOriginalExtension();
            
            $pictureNameToStore = $pictureName.'_'.time().'.'.$extensionPicture;
            
            $pathPicture    = $request->file('picture')->storeAs('public/pictures', $pictureNameToStore);
            
            $profile->picture = $pictureNameToStore;
        }

        if($request->hasFile('file')){
        
            $fileNameExt    = $request->file('file')->getClientOriginalName();
             
            $fileName       = pathinfo($fileNameExt, PATHINFO_FILENAME);
             
            $extensionFile      = $request->file('file')->getClientOriginalExtension();
              
            $fileNameToStore    = $fileName.'_'.time().'.'.$extensionFile;
         
            $pathFile       = $request->file('file')->storeAs('public/files', $fileNameToStore);

            $profile->file = $fileNameToStore;
        }
         
        $profile->name = $request->input('name');
        $profile->last_name = $request->input('last_name'); 
        $profile->description = $request->input('description'); 
        $profile->user_id =  Auth::user()->id;
          
        $profile->save();
 
        return redirect(route('profiles.index'))->with('success', 'Perfil Alterado com sucesso!'); ;  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //Delet Files
        Storage::delete('public/files/'.$profile->file);
        Storage::delete('public/pictures/'.$profile->picture);

        $profile->delete(); 
        return redirect(route('home')); 
    }

    public function candidates($id)
    {   
        $profile = Profile::find($id);
        
        if(auth()->user()->id !== $profile->user_id){
            return redirect(route('home'));
        }

        $candidates = Candidate::where('profile_id','=', $id)->get()->all();
          
        return view('profiles.candidates')->with('candidates', $candidates);
    } 
}

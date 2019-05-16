@extends('layouts.index') 

@section('content')
<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h1>Editar Perfil</h1>
                <form method="POST" action="{{route('profiles.update',$profile->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputName" value="{{$profile->name}}" placeholder="Seu nome">
                        </div>    
                    </div> 
                    <div class="form-group row">
                        <label for="inputLastName" class="col-sm-2 col-form-label">Sobre Nome</label>
                        <div class="col-sm-10">
                            <input name="last_name" type="text" class="form-control" id="inputLasstname" value="{{$profile->last_name}}" placeholder="Seu sobrenome">
                        </div>    
                    </div>
                    <div class="form-group row">
                        <label for="inputPicture" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-2">
                            <img src="/storage/pictures/{{$profile->picture}}" width="60" class="rounded-circle"> 
                        </div>
                       <div class="col-sm-8">
                            <input name="picture" type="file" class="form-control-file" >
                       </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label for="textDescription">Fale um pouco sobre voce</label>
                        <textarea name="description" class="form-control" id="textArea" rows="3"> {{$profile->description}} </textarea>
                    </div>
                    <hr />
                    <div class="form-group row">
                        <label for="inputFile" class="col-sm-2 col-form-label">Currículo</label>
                        <div class="col-sm-2">
                                <a href="/storage/files/{{$profile->file}}" role="button" class="btn btn-dark mr-2"> Visualizar  </a> 
                        </div> 
                        <div class="col-sm-8">
                            <input name="file" type="file" class="form-control-file" >
                        </div>
                    </div>
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
                     
                </form>
            </div>
        </div>
    </div>
    
@endsection
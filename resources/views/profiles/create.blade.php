@extends('layouts.index') 

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h1>Cadastrar Perfil</h1>
                <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Seu nome">
                        </div>    
                    </div> 
                    <div class="form-group row">
                        <label for="inputLastName" class="col-sm-2 col-form-label">Sobre Nome</label>
                        <div class="col-sm-10">
                            <input name="last_name" type="text" class="form-control" id="inputLasstname" placeholder="Seu sobrenome">
                        </div>    
                    </div>
                    <div class="form-group row">
                        <label for="inputPicture" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input name="picture" type="file" class="form-control-file">
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label for="textDescription">Fale um pouco sobre voce</label>
                        <textarea name="description" class="form-control" id="textArea" rows="3"> </textarea>
                    </div>
                    <hr />
                    <div class="form-group row">
                        <label for="inputFile" class="col-sm-2 col-form-label">Currículo</label> 
                        <div class="col-sm-10">
                            <input name="file" type="file" class="form-control-file">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar Perfil</button>
                    
                </form>
            </div>
        </div>
    </div>
      
@endsection
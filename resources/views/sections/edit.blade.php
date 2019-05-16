@extends('layouts.admin-index') 

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h1>Alterar Setor</h1>
                <form method="POST"action="{{route('sections.update', $section->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                         <input type="text" name='title' class="form-control" id="titleSection" value="{{$section->title}}"  placeholder="Digite o título do setor">
                    </div>
                     
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    
                </form>
            </div>
        </div>
    </div>
    
@endsection
@extends('layouts.index') 

@section('content')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                            {{$profile->name}} {{$profile->last_name}}
                    </div>
                    <div class="card-body">
                     <p class="card-text">
                        <img src="/storage/pictures/{{$profile->picture}}" width="100" class="rounded-circle float-left mr-4">
                        {{$profile->description}} 
                    </p>
                     <div class="container ">
                        <div class="row">  
                            <a href="/storage/files/{{$profile->file}}" role="button" class="btn btn-dark mr-2">Ver Currículo</a>
                            <a href="{{route('profiles.edit', $profile->id)}}" role="button" class="btn btn-warning mr-2">Editar</a>
                            <form action="{{route('profiles.destroy', $profile->id)}}"  method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Excluir</button> 
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection
 
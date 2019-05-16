@extends('layouts.admin-index') 

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Setor: {{$job->section->title}}
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Vaga: {{$job->title}}</h5>
                    <p class="card-text">{!!($job->description)!!}</p>
                    <div class="container ">
                            <div class="row">  
                                <a href="{{route('jobs.edit', $job->id)}}"  role="button" class="btn btn-warning mr-2">Editar</a>
                                <form action="{{route('jobs.destroy', $job->id)}}" method="POST">
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
    </div>
 
@endsection
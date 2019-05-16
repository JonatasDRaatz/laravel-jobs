@extends('layouts.admin-index') 

@section('content')
    <div class="row">
        <div class="col">  
            <h1>Vagas Cadastradas</h1>
        </div>
        <div class="col text-right ">  
            <a href="jobs/create" role="button" class="btn btn-outline-success ">+ Criar nova Vaga</a>
        </div> 
    </div>
    @if(count($jobs) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col " >Nome da vaga</th>
                <th scope="col">Setor</th>
                <th scope="col">Data</th>
                <th scope="col ">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{$job->title}}</td>
                        <td>{{$job->section->title}}</td>
                        <td>{{ date( 'd/m/Y' , strtotime($job->created_at))}}</td>
                        <td>
                            <div class="container">
                                <div class="row">  
                                    <a href="{{route('jobs.show', $job->id)}}" role="button" class="btn btn-primary mr-2"> Visualizar</a>
                                    <a href="{{route('jobs.edit', $job->id)}}" role="button" class="btn btn-warning mr-2">Editar</a>
                                    <a href="{{ route('candidates',  $job->id)}}" role="button" class="btn btn-info mr-2">Candidatos</a>
                                    <form action="{{route('jobs.destroy', $job->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Excluir</button> 
                                    </form> 
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
        </table>
        {{$jobs->links()}}
    @else
        <p>Nenhuma Vaga Cadastrada</p> 
    @endif 
@endsection
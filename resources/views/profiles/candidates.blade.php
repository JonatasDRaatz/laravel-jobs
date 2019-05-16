@extends('layouts.index') 

@section('content')
    <h1>Minhas candidaturas</h1>
    @if(count($candidates) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col ">Vaga</th>
                <th scope="col">Setor</th>
                <th scope="col">Data</th>
            </thead>
            <tbody>
                @foreach ($candidates as $candidate)
                    <tr>
                        <td>{{$candidate->job->title}}</td>
                        <td>{{$candidate->job->section->title}}</td>
                        <td> {{$candidate->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    @else
        <div class="alert alert-success alert-dismissible fade show">
            No momento você não está concorrendo para nenhuma de nossas vagas.
        </div>  
    @endif
         

@endsection
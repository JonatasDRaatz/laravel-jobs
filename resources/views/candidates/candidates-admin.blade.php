@extends('layouts.admin-index') 

@section('content')
    <div class="row">
        <div class="col">  
            <h1>Candidatos cadastrados</h1>
        </div>  
    </div>
    <h4>Vaga:{{$job->title }} | Setor:{{$job->section->title }}</h4>
     
    @if(count($candidates) > 0)
          <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col " >Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col ">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <td class="align-middle"> <img src="/storage/pictures/{{ $candidate->profile->picture }}" width="70" class="rounded-circle">  </td>
                        <td class="align-middle">{{$candidate->profile->name }} {{$candidate->profile->last_name }}</td>
                        <td class="align-middle">{{$candidate->created_at->diffForHumans()}}
                        <td class="align-middle"> 
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$candidate->profile->id }}">
                                Visualizar Descriçao
                            </button>
        
                            <a href="/storage/files/{{ $candidate->profile->file }}" role="button" class="btn btn-dark mr-2"> Visualizar Currículo</a> 
                        </td> 
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="modal{{$candidate->profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Candidato {{$candidate->profile->name }} {{$candidate->profile->last_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                    {{$candidate->profile->description }}
                            </div>
                                
                        </div>
                        </div>
                    </div>
                @endforeach 
            </tbody> 
        </table>
    @else 
        <div class="alert alert-warning" role="alert">
            Nenhum candidato cadastrado até o momento! 
        </div>
    @endif
@endsection
@extends('layouts.index') 

@section('content')
    <div class="row justify-content-center">
        <div class="col">
 
            <h3>Confira nossas oportunidades </h3>
            

            @if(count($jobs))
                <div class="table-responsive-lg">
                    <table class="table">
                        <thead>
                            <th>Vaga</th>
                            <th>Setor</th>
                            <th>Publicado</th>
                            <th>  </th>
                        </tr> 
                        @foreach ($jobs as $job )
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->section->title}}</td>
                            <td> {{$job->created_at->diffForHumans()}}</td> 
                            <td><a href="job/{{$job->id}} " role="button" class="btn btn-dark mr-2"> Visualizar  </a></td>
                        </tr>           

                     
                        
                         @endforeach
                    </table>
                </div>
            @else
                <p>No momento nao temos nenhuma oportunidade disponível!</p> 
            @endif 
 
        </div>
    </div>
@endsection
 
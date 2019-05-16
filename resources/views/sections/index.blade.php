@extends('layouts.admin-index') 

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h1>Setores</h1>
                <form class="form-inline" method="POST" >
                    {{ csrf_field() }}
                    <label class="sr-only" for="inlineFormInputSetor2">Setor</label>
                    <input type="text" name="title" class="form-control mb-2 mr-sm-2" id="inlineFormInputSetor" placeholder="Nome do setor">
                     
                    <button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
                </form>
                @if(count($sections) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col " >Setor</th> 
                            <th scope="col ">Açao</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{$section->title}}</td> <td>
                                        <div class="container">
                                            <div class="row">  
                                                
                                                <a href="{{route('sections.edit', $section->id)}}" role="button" class="btn btn-warning mr-2">Editar</a>
                                                <form action="{{route('sections.destroy', $section->id)}}" method="POST">
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
                    {{$sections->links()}}
                @else
                    <p>Nenhum setor cadastrado</p> 
                @endif 
            </div>
        </div>
    </div>
@endsection
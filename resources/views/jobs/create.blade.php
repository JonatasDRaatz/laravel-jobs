@extends('layouts.admin-index') 

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h1>Cadastrar nova Vaga</h1>
                <form method="POST" action="{{ route('jobs.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputTitle">Título da vaga</label>
                        <input type="text" name="title" class="form-control" id="titleJob"  placeholder="Digite o título da vaga">
                    </div>
                    <div class="form-group">
                        <label for="section">Setor</label>
                        <select name="section_id" class="form-control" id="sectionSelect">
                            <option>Selecione</option>
                            @foreach ($sections as $section)
                                <option value="{{$section->id}}">{{$section->title}}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="textDescription">Descrição</label>
                            <textarea id="textAreaDescription" name="description" class="form-control"  rows="3"></textarea>
                        </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div> 
@endsection
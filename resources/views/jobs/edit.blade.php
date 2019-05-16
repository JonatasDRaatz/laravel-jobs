@extends('layouts.admin-index') 

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">
                <h1>Alterar Vaga</h1>
                <form method="POST"action="{{route('jobs.update', $job->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputTitle">Título da vaga</label>
                        <input type="text" name='title' class="form-control" id="titleJob" value="{{$job->title}}"  placeholder="Digite o título da vaga">
                    </div>
                    <div class="form-group">
                        <label for="section">Setor</label>
                        <select name='section_id' class="form-control" id="sectionSelect">
                            <option>Selecione</option>
                            @foreach ($sections as $section)
                                @if($section->id == $job->section->id)
                                    <option selected value="{{$section->id}}">{{$section->title}}</option>
                                @endif
                                    <option value="{{$section->id}}">{{$section->title}}</option>
                                @endforeach  
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="textDescription">Descrição</label>
                        <textarea name='description' id="textAreaDescription" class="form-control"  rows="3">{{$job->description}}</textarea>
                    </div>
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    
                </form>
            </div>
        </div>
    </div>
    
@endsection
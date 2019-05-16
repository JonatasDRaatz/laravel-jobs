@extends('layouts.admin-index')

@section('content')
    <h1>Área Administrativa</h1>
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><i class="fas fa-file-alt"></i> Vagas  </div>
                <div class="card-body">
                    <h5 class="card-title">{{$jobs}} vagas cadastradas</h5>
                     
                </div>
            </div>
        </div>
        <div class="col">
                <div class="card text-white bg-success  mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="fas fa-users"></i> Usuários </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$users}} usuários cadastrados</h5>
                         
                    </div>
                </div>
            </div>
            <div class="col">
                    <div class="card text-white bg-dark  mb-3" style="max-width: 18rem;">
                        <div class="card-header"><i class="fas fa-copy"></i> Candidatos</div>
                        <div class="card-body">
                            <h5 class="card-title">{{$candidates}} candidatos</h5>
                             
                        </div>
                    </div>
                </div>
    </div>
@endsection
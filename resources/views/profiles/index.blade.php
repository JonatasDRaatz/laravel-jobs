@extends('layouts.index') 

@section('content')
<h1>Perfil</h1>
<div class="row">
     @if(count($profiles) > 0)
        @foreach ($profiles as $profile)
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Minhas Candidaturas</div>
                    <div class="card-body">
                        <p class="card-text">Visualize as vagas que voce se candidatou</p>
                        <a href="{{route('profiles.candidate',$profile->id)}}"  role="button" class="btn btn-outline-light mb-2">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Meu Perfil</div>
                    <div class="card-body">
                        <p class="card-text">Visualize seu perfil completo</p>
                        <a href="{{route('profiles.show',$profile->id)}} " role="button" class="btn btn-outline-light mb-2">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Editar Perfil</div>
                    <div class="card-body">
                        <p class="card-text">Mantenha seu currículo atualizado</p>
                        <a href="{{route('profiles.edit',$profile->id)}} " role="button" class="btn btn-outline-light mb-2">Editar</a>
                    </div>
                </div>
            </div>
        @endforeach
     @else
        <div class="col"> 
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Criar Perfil</div>
                <div class="card-body"> 
                    <p class="card-text">Crie seu perfil para poder se candidatar em nossas vagas!</p>
                    <a href="{{ route('profiles.create') }}" role="button" class="btn btn-outline-light mb-2">Cadastrar</a>
                </div>
            </div>
        </div>
        
    @endif 
</div>
@endsection
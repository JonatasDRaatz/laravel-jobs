@extends('layouts.index') 
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-8">
            <div class="card">
                <h5 class="card-header">{{$job->section->title}}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{$job->title}} </h5>
                    <p class="card-text">{{strip_tags($job->description)}}</p>
                    <a href="{{route('create.candidate' )}} " role="button" class="btn btn-primary btn-lg btn-block">Quero me candidatar</a>
                </div>
                <div class="card-footer text-muted">
                        {{$job->created_at->diffForHumans()}} 
                    </div>     
            </div>
        </div>
    </div>
</div>

@endsection
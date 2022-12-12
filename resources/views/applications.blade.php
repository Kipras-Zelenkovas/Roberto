@extends('layouts.mainlayout')

@section('content')
<div class="row d-block d-lg-flex">
    @foreach ($applications as $application)
        <div class="col-3">
            <div class="card" style="width: 20rem">
                <div class="card-body" >
                    <p class="card-text text-wrapper">{{$application->letter}}</p>
                    <a href="/application?id={{$application->id}}" class="btn d-block btn-primary">Check application</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
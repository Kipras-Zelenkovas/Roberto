@extends('layouts.mainlayout')

@section('content')
    
<div class="container text-center">
    <div class="row">
      <div class="col-2 align-self-start">
  </div>
      <div class="col-2 align-self-center">
      <div class="mb-2">
      <div class="border border-white p-auto h-auto w-auto text-white"><h3>{{$job->position}}</h3></div>
  </div>
      </div>
      <div class="col-1 align-self-center"></div>
      <div class="col-2 align-self-center">
      <div class="mb-2">
      <div class="border border-white p-auto h-auto w-auto text-white"><h3>{{$job->city->name}}<h3></div>
  </div>
      </div>
      <div class="col-1 align-self-center"></div>
      <div class="col-2 align-self-center">
      <div class="mb-2">
      <div class="border border-white p-auto h-auto w-auto text-white"><h3>{{$job->wage}}</h3></div>
  </div>
      </div>
      <div class="col-2 align-self-end">
      </div>
      </div>
    </div>
  
  
  <div class="container text-center ">
    <div class="row">
      <div class="col-3 align-self-start">
      </div>
      <div class="col-6 align-self-center">
      <div class="border border-white p-5 mb-5 ">
      <div class="description-content text-white p-auto h-auto w-auto text-break
      " data-impression-collected="true">
            <h5>{{$job->description}}</h5>
        </div>
      </div>
      <div class="col-3 align-self-end">
      </div>
    </div>
  </div>
  </div>
  
  
    <div class="container text-center bottext">
    <div class="row">
      @can('modify', $job)
      <div class="col-1 align-self-start">
        <a class="btn btn-warning" href="/job-modify?id={{$job->id}}" role="button">update</a>
        </div>
        <div class="col-1 align-self-center">
        <form action="/delete?id={{$job->id}}" method="post">@csrf<button class="btn btn-danger" type="submit">delete</button></form>
        </div>
      <a class="col-1 btn btn-success" href="/applications?id={{$job->id}}" role="button">applications</a>
    @endcan
      <div class="col-9 align-self-center"></div>
      <div class="col-1 align-self-end">
      <a class="btn btn-success" href="/application-add?id={{$job->id}}" role="button">apply</a>
      </div>
    </div>
  </div>

@endsection
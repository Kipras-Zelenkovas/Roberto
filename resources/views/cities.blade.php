@extends('layouts.mainlayout')

@section('content')
    
<div class="d-flex">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr scope="row">
                    <th>{{$city->id}}</th>
                    <td>{{$city->name}}</td>
                    <td>
                        <form action="/city-delete?id={{$city->id}}" method="post">@csrf<button class="btn btn-dark text-white">Delete</button></form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>

@endsection
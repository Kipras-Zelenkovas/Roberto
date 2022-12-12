@extends('layouts.mainlayout')



@section('content')

    <div class="md:d-flex d-block">
        <div class="md:d-flex d-block">
            <form action="search-city" method="POST" class="d-flex px-2 py-2" role="search">
                @csrf
                <select name="city_id" class="form-control me-2" id="">
                <option value="" selected disabled>Seclect city</option>
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
                </select>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    
        <div class="row d-block d-lg-flex">
            @foreach ($jobs as $job)
                <div class="col-3">
                    <div class="card" style="width: 20rem">
                        <div class="card-body" >
                            <h5 class="card-title">{{$job->title}}</h5>
                            <p class="card-text text-wrapper">{{$job->description}}</p>
                            <a href="/job?id={{$job->id}}" class="btn d-block btn-primary">Check job</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="from-top-2rem paging">
            <nav aria-label="">
              <ul class="pagination justify-content-center">
                  @if ($page > 1)
                  <li class="page-item"><a class="page-link bg-dark border-secondary" href="/?page={{$page-1}}">Previous</a></li>
                  @endif
                  <li class="page-item"><a class="page-link bg-dark border-secondary" href="/?page={{$page+1}}">Next</a></li>
              </ul>
            </nav>
        </div>
    </div>
@endsection
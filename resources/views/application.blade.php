@extends('layouts.mainlayout')

@section('content')
<div class="flex container">

    <h1 class="text-center">{{$job->title}}</h1>
    <p class="text-center">{{$application->letter}}</p>
    <div class="d-flex justify-content-end">
      @can('modify', $job)
        <form action="/application-delete?id={{$application->id}}" method="post">@csrf<button type="submit" class="btn btn-danger">Delete</button></form>
      @endcan
    </div>
  </div>
</body>


<footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</footer>
@endsection
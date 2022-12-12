@extends('layouts.mainlayout')

@section('content')
    
<div class="container-fluid">
    <section class="gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <form method="POST" action="/update?id={{$job->id}}" class="card-body p-5 text-center">
                    @csrf 
                    <div class="mb-md-5 mt-md-4 pb-5">
      
                        <h2 class="fw-bold mb-2 text-uppercase">Modify job</h2>
                        <p class="text-white-50 mb-5"></p>
      
                        <div class="form-outline form-white mb-4">
                            <input type="text" id="typeEmailX" name="title" class="form-control form-control-lg" value="{{$job->title}}" />
                            <label class="form-label" for="typeEmailX">Title</label>
                        </div>
      
                        <div class="form-outline form-white mb-4">
                            <input type="text" id="typePasswordX" name="position" class="form-control form-control-lg" value="{{$job->position}}" />
                            <label class="form-label" for="typePasswordX">Position</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <textarea type="text" id="typePasswordX" name="description" class="form-control form-control-lg">{{$job->description}}</textarea>
                            <label class="form-label" for="typePasswordX">Description</label>
                        </div>

                        <div class="form-outline form-white mb-4">
                            <input type="text" id="typePasswordX" value="{{$job->wage}}" name="wage" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX">Wage</label>
                        </div>


                        <div class="form-outline form-white mb-4">
                            <select id="Category" class="select" name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                              </select>
                            <label class="form-label" for="Category">City</label>
                        </div>

                        
          
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Update job</button>
      
                    </div>  
      
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>

@endsection
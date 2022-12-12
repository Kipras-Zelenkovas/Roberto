@extends('layouts.mainlayout')

@section('content')
    
<div class="container-fluid">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <form method="POST" action="/application-create" class="card-body p-5 text-center">
                    @csrf 
                    <div class="mb-md-5 mt-md-4 pb-5">
                        <input class="visually-hidden" name="job_id" value="{{$job_id}}" />
                        <h2 class="fw-bold mb-2 text-uppercase">Create application</h2>
                        <p class="text-white-50 mb-5"></p>
      
                        <div class="form-outline form-white mb-4">
                            <textarea type="text" id="typeEmailX" name="letter" class="form-control form-control-lg"></textarea>
                            <label class="form-label" for="typeEmailX">Letter</label>
                        </div>
          
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Apply</button>
      
                    </div>  
      
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>

@endsection
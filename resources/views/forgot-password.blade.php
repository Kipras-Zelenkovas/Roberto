@extends('layouts.authlayout')

@section('content')

<div class="container-fluid">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <form method="POST" action="/forgot-password" class="card-body p-5 text-center">
                    @csrf
                    <div class="mb-md-5 mt-md-4 pb-5">
      
                        <h2 class="fw-bold mb-2 text-uppercase">Forgot password</h2>
                        <p class="text-white-50 mb-5">Please enter your email</p>
      
                        <div class="form-outline form-white mb-4">
                        <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="typeEmailX">Email</label>
                        </div>
      
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Send link</button>
      
                    </div>
      
                    <div>
                        <p class="mb-0">Did you remember password? <a href="/login" class="text-white-50 fw-bold">Login</a>
                        </p>
                    </div>
      
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>

@endsection
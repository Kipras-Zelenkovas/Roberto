<?php

namespace App\Providers;

use App\Models\Jobs;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return 'http://127.0.0.1:8000/reset/token='.$token.'?email='. $user->email;
        });


        $this->registerPolicies();

        Gate::define('admin', function(User $user){
            return $user->admin == 1;
        });

        Gate::define('modify', function(User $user, Jobs $job){
            return $user->id == $job->user_id || $user->admin == 1;
        });
    }
}

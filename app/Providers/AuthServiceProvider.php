<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use App\Models\User;


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

        //$this->registerPolicies();
        Fortify::authenticateUsing(function ($request) {
            $validated = Auth::validate([
                'samaccountname' => $request->username,
                'password' => $request->password
            ]);

            return $validated ? Auth::getLastAttempted() : null;
        });

        
    }

}


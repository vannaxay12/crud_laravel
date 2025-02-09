<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        $this->registerPolicies();

        // ตรวจสอบว่า user เป็น admin หรือไม่
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin' 
                ? Response::allow() 
                : Response::deny('You do not have admin privileges.');
        });

        // เพิ่ม Gate อื่นๆ ที่คุณต้องการที่นี่ เช่น
        // Gate::define('isEditor', function (User $user) {
        //     return $user->role === 'editor' 
        //         ? Response::allow() 
        //         : Response::deny('You do not have editor privileges.');
        // });
    }
}

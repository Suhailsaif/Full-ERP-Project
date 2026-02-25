
<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{

protected $policies = [
    Project::class => ProjectPolicy::class,
];


public function boot()
{
    $this->registerPolicies();

    Gate::before(function ($user, $ability) {
        if ($user->hasPermission($ability)) {
            return true;
        }
    });


}

}

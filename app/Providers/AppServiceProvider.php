<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use App\Contracts\Services\ProjectServiceInterface;
use App\Services\ProjectService;

use App\Repositories\Contracts\ProjectRepositoryInterface;
use App\Repositories\Contracts\AttendanceRepositoryInterface;
use App\Repositories\Contracts\PayrollRepositoryInterface;

use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Eloquent\AttendanceRepository;
use App\Repositories\Eloquent\PayrollRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
  public function register(): void
{
    // $this->app->bind(
    //     ProjectServiceInterface::class,
    //     ProjectService::class
    // );


        $this->app->bind(
        ProjectRepositoryInterface::class,
        ProjectRepository::class
    );

        $this->app->bind(
        AttendanceRepositoryInterface::class,
        AttendanceRepository::class
    );

    $this->app->bind(
        PayrollRepositoryInterface::class,
        PayrollRepository::class
    );

//     $this->app->bind(
//     ClientServiceInterface::class,
//     ClientService::class
// );
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null
        );
    }
}

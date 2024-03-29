<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web','auth')
                ->name('admin.')
                ->prefix('admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::middleware('web','auth')
                ->name('instructor.')
                ->prefix('instructor')
                ->namespace($this->namespace)
                ->group(base_path('routes/instructor.php'));

            Route::middleware('web','auth')
                ->name('payment.')
                ->prefix('payment')
                ->namespace($this->namespace)
                ->group(base_path('routes/payment.php'));

            Route::middleware('web','auth')
                ->name('teacher.')
                ->prefix('teacher')
                ->namespace($this->namespace)
                ->group(base_path('routes/teacher.php'));

            Route::middleware('web','auth')
                ->name('student.')
                ->prefix('student')
                ->namespace($this->namespace)
                ->group(base_path('routes/student.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}

<?php
/*
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider{

    public const Home = '/home';

    public function boot(){
        RateLimiter::for('api', function (Request $request){
            return Limit::perMinute(60)->by($request->user()?->id ?: $request-> ip());
        });
        $this->routes(function(){
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
 
            Route::middleware('web')
            ->group(base_path('routes/web.php'));

            Route::middleware('web')
            ->group(base_path('routes/web.php'));
        });
    }
}
    */
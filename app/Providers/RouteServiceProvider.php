<?php

namespace App\Providers;

use App\Attributes\Method;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use RabbitCMS\Modules\Support\ClassCollector;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function (Router $router) {
            ClassCollector::make(app_path('Http/Controllers'), '\App\Http\Controllers')
                ->find()->each(function (\ReflectionClass $class) use ($router) {
                    foreach ($class->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
                        $attributes = $method->getAttributes(Method::class, \ReflectionAttribute::IS_INSTANCEOF);
                        foreach ($attributes as $attribute) {
                            $attribute->newInstance()($method, $router);
                        }
                    }
                });
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
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}

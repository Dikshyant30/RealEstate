<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserCrud\UserRepositoryInterface;
use App\Repositories\ProjectCrud\ProjectRepositoryInterface;
use App\Repositories\LocationCrud\LocationRepositoryInterface;
use App\Repositories\PropertyCrud\PropertyRepositoryInterface;
use App\Repositories\UserCrud\UserRepository;
use App\Repositories\ProjectCrud\ProjectRepository;
use App\Repositories\LocationCrud\LocationRepository;
use App\Repositories\PropertyCrud\PropertyRepository;
Use App\User;
Use App\Project;
Use App\Location;
Use App\Property;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class,UserRepository::class);
        $this->app->singleton(ProjectRepositoryInterface::class,ProjectRepository::class);
        $this->app->singleton(LocationRepositoryInterface::class,LocationRepository::class);
        $this->app->singleton(PropertyRepositoryInterface::class,PropertyRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

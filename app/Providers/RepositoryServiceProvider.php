<?php

namespace App\Providers;

use App\Repositories\Eloquent\EmployeeRepository;
use App\Repositories\Eloquent\OvertimeRepository;
use App\Repositories\Eloquent\SettingRepository;
use App\Repositories\EmployeeRepositoryInterface;
use App\Repositories\OvertimeRepositoryInterface;
use App\Repositories\SettingRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeRepositoryInterface::class,EmployeeRepository::class);
        $this->app->bind(OvertimeRepositoryInterface::class,OvertimeRepository::class);
        $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

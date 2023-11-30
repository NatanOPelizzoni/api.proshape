<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        $this->app->bind(\App\Repositories\AuthRepositoryInterface::class, \App\Repositories\AuthRepository::class);
        $this->app->bind(\App\Repositories\StudentRepositoryInterface::class, \App\Repositories\StudentRepository::class);
        $this->app->bind(\App\Repositories\MuscularGroupRepositoryInterface::class, \App\Repositories\MuscularGroupRepository::class);
        $this->app->bind(\App\Repositories\ExerciseRepositoryInterface::class, \App\Repositories\ExerciseRepository::class);
        $this->app->bind(\App\Repositories\TrainingSheetRepositoryInterface::class, \App\Repositories\TrainingSheetRepository::class);
        $this->app->bind(\App\Repositories\ExerciseTrainingSheetRepositoryInterface::class, \App\Repositories\ExerciseTrainingSheetRepository::class);
    }
}

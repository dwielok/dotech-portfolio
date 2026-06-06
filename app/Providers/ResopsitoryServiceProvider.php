<?php

namespace App\Providers;

use App\Contracts\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
    }
}

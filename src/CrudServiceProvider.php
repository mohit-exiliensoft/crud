<?php

namespace User\Crud;

use User\Crud\Repositories\PermissionRepository;
use User\Crud\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;
use User\Crud\Interfaces\AdminUserRepositoryInterface;
use User\Crud\Interfaces\PermissionRepositoryInterface;
use User\Crud\Interfaces\RoleRepositoryInterface;
use User\Crud\Repositories\AdminUserRepository;

class CrudServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(AdminUserRepositoryInterface::class, AdminUserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'crud');
        $this->loadTranslationsFrom(__DIR__.'/langs', 'crud');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/lang' => resource_path('lang/user/crud'),
        ]);
        
        $this->publishes([
            __DIR__.'/database/migrations/2024_15_11_0003_alter_add_user_crud_table.php' => database_path('migrations/2024_15_11_0003_alter_add_user_crud_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/database/migrations/2024_18_11_0004_create_role_table.php' => database_path('migrations/2024_18_11_0004_create_role_table.php'),
        ], 'migrations');
        $this->publishes([
            __DIR__.'/database/migrations/2024_18_11_0005_create_permission_table.php' => database_path('migrations/2024_18_11_0005_create_permission_table.php'),
        ], 'migrations');

    }
    
}

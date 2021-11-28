<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\User;
use App\Policies\BannerPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        Banner::class => BannerPolicy::class,
        Category::class => CategoryPolicy::class,
        Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateUser();
        $this->defineGateProduct();
        $this->defineGateBanner();
        $this->defineGateCategory();
        $this->defineGateRole();    
    }

    public function defineGateUser()
    {
        Gate::define('list_user', [UserPolicy::class, 'viewAny'] );
        Gate::define('create_user', [UserPolicy::class, 'create'] );
        Gate::define('edit_user', [UserPolicy::class, 'update'] );
        Gate::define('delete_user', [UserPolicy::class, 'delete'] );
    }

    public function defineGateProduct()
    {
        Gate::define('list_product', [ProductPolicy::class, 'viewAny'] );
        Gate::define('create_product', [ProductPolicy::class, 'create'] );
        Gate::define('edit_product', [ProductPolicy::class, 'update'] );
        Gate::define('delete_product', [ProductPolicy::class, 'delete'] );
    }

    public function defineGateBanner()
    {
        Gate::define('list_banner', [BannerPolicy::class, 'viewAny'] );
        Gate::define('create_banner', [BannerPolicy::class, 'create'] );
        Gate::define('edit_banner', [BannerPolicy::class, 'update'] );
        Gate::define('delete_banner', [BannerPolicy::class, 'delete'] );
    }

    public function defineGateCategory()
    {
        Gate::define('list_category', [CategoryPolicy::class, 'viewAny'] );
        Gate::define('create_category', [CategoryPolicy::class, 'create'] );
        Gate::define('edit_category', [CategoryPolicy::class, 'update'] );
        Gate::define('delete_category', [CategoryPolicy::class, 'delete'] );
    }

    public function defineGateRole()
    {
        Gate::define('list_role', [RolePolicy::class, 'viewAny'] );
        Gate::define('create_role', [RolePolicy::class, 'create'] );
        Gate::define('edit_role', [RolePolicy::class, 'update'] );
        Gate::define('delete_role', [RolePolicy::class, 'delete'] );
    }
}

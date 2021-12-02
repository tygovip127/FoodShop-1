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
use App\Services\PermissionGateAndPolicyAccess;
use Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        $permission_gate_and_policy = new PermissionGateAndPolicyAccess;
        $permission_gate_and_policy->setGateAndPolicyAccess();
    }
}

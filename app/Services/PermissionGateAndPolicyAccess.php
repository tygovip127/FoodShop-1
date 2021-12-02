<?php 

namespace App\Services;

use App\Models\User;
use App\Policies\BannerPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess()
    {
        $this->defineGateUser();
        $this->defineGateProduct();
        $this->defineGateBanner();
        $this->defineGateCategory();
        $this->defineGateRole();   
        $this->defineGateAccessAdmin();
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
    
    public function defineGateAccessAdmin()
    {
        Gate::define('access_admin', function (User $user) {
            return $user->checkPermissionAccess('access_admin');
        });
    }
}
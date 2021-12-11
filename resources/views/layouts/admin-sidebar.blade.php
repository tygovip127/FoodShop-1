<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/"><img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="w-100 px-5"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/"><img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="w-100 px-1"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
             <li class="menu-header">Management</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i> <span>Management</span></a>
                @can('list_user')
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.users.index') }}">User Management</a></li>
                </ul>
                @endcan
                @can('list_product')
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.products.index') }}">Product Management</a></li>
                </ul>
                @endcan
                @can('list_product')
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.banner.index') }}">Banner Management</a></li>
                </ul>
                @endcan
                
                @can('list_product')
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category Management</a></li>
                </ul>
                @endcan
                @can('list_product')
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.roles.index') }}">Role Management</a></li>
                </ul>
                @endcan 

                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.transactions.index') }}">Transaction Management</a></li>
                </ul>
                
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.permissions.index') }}">Permission Management</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.vouchers.index') }}">Voucher Management</a></li>
                </ul>
            </li>
            <li class="nav-link mt-auto">
                <a href="#"
                    class="btn btn-primary btn-md active px-5 text-white" target="_blank" role="button" aria-pressed="true">
                    Setting Information</a>
            </li>

    </aside>
</div>
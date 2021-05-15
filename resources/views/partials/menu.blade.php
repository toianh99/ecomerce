<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Test</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @can('user_management')
                        <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                            <a class="nav-link nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-users">

                                </i>
                                <p>
                                    <span>{{ trans('cruds.userManagement.title') }}</span>
                                    <i class="right fa fa-fw fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('permission_access')
                                    <li class="nav-item">
                                        <a href="{{route('permission.index') }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                            <i class="fa-fw fas fa-unlock-alt">

                                            </i>
                                            <p>
                                                <span>{{ trans('cruds.permission.title') }}</span>
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('role_access')
                                    <li class="nav-item">
                                        <a href="{{route('roles.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                            <i class="fa-fw fas fa-briefcase">

                                            </i>
                                            <p>
                                                <span>{{ trans('cruds.role.title') }}</span>
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('user_access')
                                    <li class="nav-item">
                                        <a href="" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                            <i class="fa-fw fas fa-user">

                                            </i>
                                            <p>
                                                <span>{{ trans('cruds.user.title') }}</span>
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('product_manager')
                            <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                                <a class="nav-link nav-dropdown-toggle" href="#">
                                    <i class="fab fa-fw fa-product-hunt"></i>
                                    <p>
                                        <span>{{ trans('cruds.ProductManagement.title') }}</span>
                                        <i class="right fa fa-fw fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('product_access')
                                        <li class="nav-item">
                                            <a href="{{route('product.index') }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                                <i class=" fa-fw fas fa-bookmark"></i>
                                                <p>
                                                    <span>{{ trans('cruds.product.title') }}</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_color_access')
                                        <li class="nav-item">
                                            <a href="{{route('product-color.index') }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                                <i class=" fa-fw fas fa-palette"></i>
                                                <p>
                                                    <span>{{ trans('cruds.product_color.title') }}</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_size_access')
                                        <li class="nav-item">
                                            <a href="{{route('product-size.index')}}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                                <i class="fa-fw far fa-window-maximize"></i>
                                                <p>
                                                    <span>{{ trans('cruds.product_size.title') }}</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('brand_access')
                                        <li class="nav-item">
                                            <a href="{{route('brand.index')}}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                                <i class="fa-fw far fa-window-maximize"></i>
                                                <p>
                                                    <span>{{ trans('cruds.brand.title') }}</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('category_access')
                                        <li class="nav-item">
                                            <a href="{{route('category.index')}}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                                <i class="fa-fw far fa-window-maximize"></i>
                                                <p>
                                                    <span>{{ trans('cruds.category.title') }}</span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('product_variant_access')
                                            <li class="nav-item">
                                                <a href="{{route('product-variant.index')}}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                                    <i class="fa-fw fas fa-coins"></i>
                                                    <p>
                                                        <span>{{ trans('cruds.product_variant.title') }}</span>
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                </ul>
                            </li>
                    @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

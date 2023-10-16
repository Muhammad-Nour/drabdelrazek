<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <div style="text-align: center">
    <a href="{{ route('admindashboard') }}">
      <img src="{{ asset('design/images/side-logo.jpg') }}" style="width: 230px">
    </a>
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{--
    <div class="user-panel d-flex">
      <div class="image">
        <img src="{{ asset('design/images/user.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="{{ route('admindashboard') }}" class="nav-link {{ request()->routeIs('admindashboard') ? 'active' : '' }}">
              <i class="nav-icon fa fa-th-large "></i>
              <p>{{ __('site.dasboard') }}</p>
            </a>
          </li>
          @can('settings')
          <li class="nav-item {{ request()->routeIs('settings.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.settings') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link {{ request()->routeIs('settings.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan

          @can('customs')
          <li class="nav-item {{ request()->routeIs('customs.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('customs.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.customs') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customs.index') }}" class="nav-link {{ request()->routeIs('customs.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan('customs')

          @can('branches')
          <li class="nav-item {{ request()->routeIs('branches.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('branches.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.branches') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('branches.index') }}" class="nav-link {{ request()->routeIs('branches.index') ? 'sub-active' : '' }} ">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_branches')
              <li class="nav-item">
                <a href="{{ route('branches.create') }}" class="nav-link {{ request()->routeIs('branches.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_branches')
            </ul>
          </li>
          @endcan('branches')
          @can('blogs')
          <li class="nav-item {{ request()->routeIs('blogs.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.blogs') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blogs.index') }}" class="nav-link {{ request()->routeIs('blogs.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_blogs')
              <li class="nav-item">
                <a href="{{ route('blogs.create') }}" class="nav-link {{ request()->routeIs('blogs.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_blogs')
            </ul>
          </li>
          @endcan('blogs')

          @can('projects')
          <li class="nav-item {{ request()->routeIs('projects.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.projects') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_projects')
              <li class="nav-item">
                <a href="{{ route('projects.create') }}" class="nav-link {{ request()->routeIs('projects.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_projects')
            </ul>
          </li>
          @endcan('projects')

<!--           @can('partners')
          <li class="nav-item {{ request()->routeIs('partners.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('partners.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.partners') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('partners.index') }}" class="nav-link {{ request()->routeIs('partners.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_partners')
              <li class="nav-item">
                <a href="{{ route('partners.create') }}" class="nav-link {{ request()->routeIs('partners.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_partners')
            </ul>
          </li>
          @endcan('partners') -->

          @can('contacts')
          <li class="nav-item {{ request()->routeIs('contacts.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.contacts') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link {{ request()->routeIs('contacts.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_contacts')
              <li class="nav-item">
                <a href="{{ route('contacts.create') }}" class="nav-link {{ request()->routeIs('contacts.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_contacts')
            </ul>
          </li>
          @endcan('contacts')

          @can('appointments')
          <li class="nav-item {{ request()->routeIs('appointments.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('appointments.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.appointments') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('appointments.index') }}" class="nav-link {{ request()->routeIs('appointments.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_appointment')
              <li class="nav-item">
                <a href="{{ route('appointments.create') }}" class="nav-link {{ request()->routeIs('appointments.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_appointment')
            </ul>
          </li>
          @endcan('appointments')

          @can('sliders')
          <li class="nav-item {{ request()->routeIs('sliders.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('sliders.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                {{ __('site.slider') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link {{ request()->routeIs('sliders.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
            @can('add_sliders')
              <li class="nav-item">
                <a href="{{ route('sliders.create') }}" class="nav-link {{ request()->routeIs('sliders.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
            @endcan('add_sliders')
            </ul>
          </li>
          @endcan('sliders')

          @can('meettings')
          <li class="nav-item {{ request()->routeIs('meettings.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('meettings.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.meettings') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('meettings.index') }}" class="nav-link {{ request()->routeIs('meettings.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_meetting')
              <li class="nav-item">
                <a href="{{ route('meettings.create') }}" class="nav-link {{ request()->routeIs('meettings.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_meetting')
            </ul>
          </li>
          @endcan('meettings')

          @can('faqs')
          <li class="nav-item {{ request()->routeIs('faqs.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('faqs.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.faqs') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('faqs.index') }}" class="nav-link {{ request()->routeIs('faqs.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_faq')
              <li class="nav-item">
                <a href="{{ route('faqs.create') }}" class="nav-link {{ request()->routeIs('faqs.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_faq')
            </ul>
          </li>
          @endcan('faqs')

          @can('services')
          <li class="nav-item {{ request()->routeIs('services.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.services') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_service')
              <li class="nav-item">
                <a href="{{ route('services.create') }}" class="nav-link {{ request()->routeIs('services.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_service')
            </ul>
          </li>
          @endcan('services')

          @can('categories')
          <li class="nav-item {{ request()->routeIs('categories.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.categories') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_category')
              <li class="nav-item">
                <a href="{{ route('categories.create') }}" class="nav-link {{ request()->routeIs('categories.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_category')
            </ul>
          </li>
          @endcan('categories')

          @can('why_us')
          <li class="nav-item {{ request()->routeIs('whys.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('whys.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.why_us') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('whys.index') }}" class="nav-link {{ request()->routeIs('whys.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_why_us')
              <li class="nav-item">
                <a href="{{ route('whys.create') }}" class="nav-link {{ request()->routeIs('whys.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_why_us')
            </ul>
          </li>
          @endcan('why_us')

<!--           @can('products')
          <li class="nav-item {{ request()->routeIs('products.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('site.products') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_products')
              <li class="nav-item">
                <a href="{{ route('products.create') }}" class="nav-link {{ request()->routeIs('products.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_products')
            </ul>
          </li>
          @endcan('products')

          @can('clients')
          <li class="nav-item {{ request()->routeIs('users.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                {{ __('site.clients') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link  {{ request()->routeIs('users.*') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan('clients') -->

          @can('users')
          <li class="nav-item {{ request()->routeIs('admins.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('admins.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                {{ __('site.users') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admins.index') }}" class="nav-link {{ request()->routeIs('admins.index') ? 'sub-active' : '' }} ">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_users')
              <li class="nav-item">
                <a href="{{ route('admins.create') }}" class="nav-link {{ request()->routeIs('admins.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_users')
            </ul>
          </li>
          @endcan('users')



          @can('roles')
          <li class="nav-item {{ request()->routeIs('roles.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                {{ __('site.roles') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link  {{ request()->routeIs('roles.index') ? 'sub-active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>{{ __('site.show') }}</p>
                </a>
              </li>
              @can('add_roles')
              <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link {{ request()->routeIs('roles.create') ? 'sub-active' : '' }}">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>{{ __('site.add') }}</p>
                </a>
              </li>
              @endcan('add_roles')
            </ul>
          </li>
          @endcan('roles')

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

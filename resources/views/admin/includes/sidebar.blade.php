<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="{{ asset('admin/assets/img/kaiadmin/logo_light.svg')}}
                "
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item {{ Request::is('admins') ? 'active' : '' }}">
                <a
                  href="{{ route('admins') }}"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
              </li>
              <li class="nav-item {{ Route::currentRouteName()=='slideshows' ? 'active' : '' }}">
                <a href="{{ route('slideshows') }}">
                  <i class="fas fa-sliders"></i>
                  <p>Slideshows</p>
                </a>
              </li>
              <li class="nav-item {{ Route::currentRouteName() =='product' ? 'active' : '' }}">
                <a href="{{ route('product') }}">
                  <i class="fas fa-cart-shopping"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item {{ Route::currentRouteName()=='users' ? 'active' : '' }}">
                <a href="{{ route('admins') }}">
                  <i class="fas fa-users"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

<!-- Main Sidebar Container -->
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{admin_ui('/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{admin_ui('/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          {{-- Dashboard --}}
                <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
                  <a href="{{admin_url('')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      {{trans('admin.admin_dashboard')}}
                      <i class="{{arrow_icon()}}"></i>
                    </p>
                  </a>

                <ul class="nav nav-treeview" style="{{ active_menu('admin')[1] }}">
                    <li class="nav-item">
                      <a href="{{admin_url('')}}" class="nav-link">
                        <p>{{trans('admin.admin_dashboard')}}</p>
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                      </a>
                    </li>

                  </ul>

                  <ul class="nav nav-treeview" style="{{ active_menu('admin')[1] }}">
                    <li class="nav-item">
                      <a href="{{admin_url('settings')}}" class="nav-link">
                        <p>{{trans('admin.settings')}}</p>
                        <i class="nav-icon fas fa-cog"></i>
                      </a>
                    </li>

                  </ul>
                </li>


              {{-- Admins --}}
              <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{trans('admin.admin_account')}}
                    <i class="{{arrow_icon()}}"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview" style="{{ active_menu('admin')[1] }}">
                  <li class="nav-item">
                    <a href="{{admin_url('admin')}}" class="nav-link active">
                      <i class="nav-icon fas fa-users"></i>
                      <p>{{trans('admin.admin_account')}}</p>
                    </a>
                  </li>

                </ul>
              </li>

              {{-- Users --}}
              <li class="nav-item has-treeview {{active_menu('users')[0]}}">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    {{trans('admin.users')}}
                    <i class="{{arrow_icon()}}"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview" style='{{ active_menu('users')[1] }}'>
                 {{-- Normal Users --}}
                <li class="nav-item">
                    <a href="{{admin_url('users')}}" class="nav-link active">
                      <i class="nav-icon fas fa-users"></i>
                      <p>{{trans('admin.users')}}</p>
                    </a>
                  </li>
                  {{-- Normal Users --}}
                <li class="nav-item">
                    <a href="{{admin_url('users')}}?level=user" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>{{trans('admin.user')}}</p>
                    </a>
                  </li>

                  {{-- Vendors --}}
                  <li class="nav-item">
                    <a href="{{admin_url('users')}}?level=vendor" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>{{trans('admin.vendor')}}</p>
                    </a>
                  </li>

                  {{-- Company --}}
                  <li class="nav-item">
                    <a href="{{admin_url('users')}}?level=company" class="nav-link">
                      <i class="nav-icon fas fa-users"></i>
                      <p>{{trans('admin.company')}}</p>
                    </a>
                  </li>

                </ul>
              </li>

              {{-- Countries --}}
              <li class="nav-item has-treeview {{active_menu('countries')[0]}}">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-flag"></i>
                  <p>
                    {{trans('admin.countries')}}
                    <i class="{{arrow_icon()}}"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview" style='{{ active_menu('countries')[1] }}'>
                <li class="nav-item">
                  <a href="{{admin_url('countries')}}" class="nav-link active">
                    <i class="nav-icon fas fa-flag"></i>
                    <p>{{trans('admin.countries')}}</p>
                  </a>
                </li>

                <li class="nav-item">
                    <a href="{{admin_url('countries/create')}}" class="nav-link active">
                      <i class="nav-icon fas fa-plus"></i>
                      <p>{{trans('admin.add-country')}}</p>
                    </a>
                  </li>

                </ul>
              </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

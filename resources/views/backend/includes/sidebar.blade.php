<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Laravel Stock</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Samit Koyom</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-item">
            <a href="{{url('backend/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">USERS MANAGE</li>
          <li class="nav-item has-treeview {{ (request()->segment(2) == 'products') ? 'menu-open' : ' ' }} {{ (request()->segment(2) == 'categorys') ? 'menu-open' : ' ' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Stocks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('backend/products')}}" class="nav-link {{ (request()->segment(2) == 'products') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('backend/categorys')}}" class="nav-link {{ (request()->segment(2) == 'categorys') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('backend/orders')}}" class="nav-link {{ (request()->segment(2) == 'orders') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('backend/payment')}}" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave-alt"></i>
              <p>
                Payment
              </p>
            </a>
          </li>

         @if(Auth::user()->isAdmin == 1)
          <li class="nav-header">ADMIN MANAGE</li>

          <li class="nav-item">
            <a href="{{url('backend/reports')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-area"></i>
              <p>
                Reports
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('backend/users')}}" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('backend/settings')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>

        @endif

          <li class="nav-header"><hr></li>
          <li class="nav-item">
            <a href="{{url('backend/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

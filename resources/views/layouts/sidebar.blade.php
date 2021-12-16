<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div> --}}

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ asset('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                    <!-- ($barActive=='home'?'active':'') -->

                </li>
                <li class="nav-item">
                    <a href="{{ asset('/post') }}" class="nav-link {{ request()->is('post') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>
                            Post
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ asset('/post/tables') }}"
                            class="nav-link {{ \Request::route()->getName() == 'post_tables' || \Request::route()->getName() == 'view' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-external-link-square-alt"></i>
                            <p>
                                Post Table
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('/tags') }}"
                            class="nav-link {{ \Request::route()->getName() == 'tags.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags Table
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>
                    </li>
                @endif


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

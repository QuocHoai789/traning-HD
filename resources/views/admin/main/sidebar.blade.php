<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admintrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('home_admin')}}" class="d-block">@if(Auth::guard('admin')->check()) {{Auth::guard('admin')->user()->name}} @endif</a>
        </div>
      </div>

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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manager Category
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('category.list')}}" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('category.add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add new category</p>
                    </a>
                  </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Manager Posts
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('post.list')}}" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Posts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('post.add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add new post</p>
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
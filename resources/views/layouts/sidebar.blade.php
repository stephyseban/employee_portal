<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Employee Portal</span>
    </a>
 
    <div class="sidebar">
    
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

   

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
          
            <a href="{{route('designation.index')}}" class="nav-link {{ (request()->is('designation*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Designation
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
         
          <li class="nav-item">
          
          <a href="{{route('employee.index')}}" class="nav-link  {{ (request()->is('employee*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Employee
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
         
        
        </ul>
        
      </nav>
   
    </div>
 
  </aside>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img width="60px" class="app-sidebar__user-avatar" src="{{ asset('storage/frontend/images/user.jpg') }}" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">Joynal Abedin</p>
      <p class="app-sidebar__user-designation">Full Stack Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li class="treeview">
        <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">
                    Blog
                </span>
            <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
      <ul class="treeview-menu">
        <li>
            <a class="treeview-item" href="{{ route('blog.allpost') }}">
                <i class="icon fa fa-circle-o"></i> All Post
            </a>
        </li>
        <li>
            <a class="treeview-item" href="{{ route('blog.create') }}">
                <i class="icon fa fa-circle-o"></i> Add New Post
            </a>
        </li>
        <li>
            <a class="treeview-item" href="{{ route('blog.trush') }}"  rel="noopener">
                <i class="icon fa fa-circle-o"></i> Unpublish Post
            </a>
        </li>
        <li>
            <a class="treeview-item" href="{{ route('category.index') }}"   rel="noopener">
                <i class="icon fa fa-circle-o"></i> Categories
            </a>
        </li>
      </ul>
    </li>

    <li class="treeview">
      <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa fa-laptop"></i>
              <span class="app-menu__label">
                 Pages
              </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
    <ul class="treeview-menu">
      <li>
          <a class="treeview-item" href="{{ route('about.create') }}">
              <i class="icon fa fa-circle-o"> About</i> 
          </a>
      </li>
      <li>
          <a class="treeview-item" href="{{ route('team.index') }}">
              <i class="icon fa fa-circle-o"></i> Team
          </a>
      </li>
      <li>
          <a class="treeview-item" href="{{ route('service.create') }}"  rel="noopener">
              <i class="icon fa fa-circle-o"></i> Services
          </a>
      </li>
      <li>
          <a class="treeview-item" href="{{ route('project.create') }}"   rel="noopener">
              <i class="icon fa fa-circle-o"></i> Project
          </a>
      </li>
    </ul>
  </li>
  <li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-laptop"></i>
            <span class="app-menu__label">
               Home Page
            </span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>
  <ul class="treeview-menu">
    <li>
        <a class="treeview-item" href="{{ route('banner.index') }}">
            <i class="icon fa fa-circle-o"> Banner</i> 
        </a>
    </li>
    <li>
        <a class="treeview-item" href="{{ route('home.create') }}">
            <i class="icon fa fa-circle-o"></i> design home
        </a>
    </li>
    <li>
        <a class="treeview-item" href="{{ route('service.create') }}"  rel="noopener">
            <i class="icon fa fa-circle-o"></i> Services
        </a>
    </li>
    <li>
        <a class="treeview-item" href="{{ route('project.create') }}"   rel="noopener">
            <i class="icon fa fa-circle-o"></i> Project
        </a>
    </li>
  </ul>
</li>
    
  </ul>
</aside>
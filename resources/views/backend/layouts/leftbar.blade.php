<!-- Sidebar menu-->
@php
    $area = session('area');
    $page = session('page');
@endphp
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img width="60px" class="app-sidebar__user-avatar" src="{{ asset('frontend/images/users/user.jpg') }}" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">Joynal Abedin</p>
      <p class="app-sidebar__user-designation">Full Stack Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{ $area == 1 ? 'active' : '' }}" href="{{ route('home') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li class="treeview {{ $area == 2 ? 'is-expanded' : '' }}">
        <a class="app-menu__item" href="#" data-toggle="treeview">
            <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">
                    Blog
                </span>
            <i class="treeview-indicator fa fa-angle-right"></i>
        </a>
      <ul class="treeview-menu">
        <li>
            <a class="treeview-item {{ $page == 1 ? 'active' : '' }}" href="{{ route('blog.index') }}">
                <i class="icon far fa-circle"></i> All Post
            </a>
        </li>
        <li>
            <a class="treeview-item {{ $page == 2 ? 'active' : '' }}" href="{{ route('blog.create') }}">
                <i class="icon far fa-circle"></i> Add New Post
            </a>
        </li>
        <li>
            <a class="treeview-item {{ $page == 3 ? 'active' : '' }}" href="{{ route('blog.trush') }}"  rel="noopener">
                <i class="icon far fa-circle"></i> Unpublish Post
            </a>
        </li>
        <li>
            <a class="treeview-item {{ $page == 4 ? 'active' : '' }}" href="{{ route('category.index') }}"   rel="noopener">
                <i class="icon far fa-circle"></i> Categories
            </a>
        </li>
      </ul>
    </li>

    <li class="treeview {{ $area == 3 ? 'is-expanded' : '' }}">
      <a class="app-menu__item" href="#" data-toggle="treeview">
          <i class="app-menu__icon fa fa-laptop"></i>
              <span class="app-menu__label">
                 Pages
              </span>
          <i class="treeview-indicator fa fa-angle-right"></i>
      </a>
    <ul class="treeview-menu">
      <li>
          <a class="treeview-item {{ $page == 5 ? 'active' : '' }}" href="{{ route('about.create') }}">
              <i class="icon far fa-circle"> About</i> 
          </a>
      </li>
      <li>
          <a class="treeview-item {{ $page == 6 ? 'active' : '' }}" href="{{ route('team.index') }}">
              <i class="icon far fa-circle"></i> Team
          </a>
      </li>
      <li>
          <a class="treeview-item {{ $page == 7 ? 'active' : '' }}" href="{{ route('service.create') }}"  rel="noopener">
              <i class="icon far fa-circle"></i> Services
          </a>
      </li>
      <li>
          <a class="treeview-item {{ $page == 8 ? 'active' : '' }}" href="{{ route('project.create') }}"   rel="noopener">
              <i class="icon far fa-circle"></i> Project
          </a>
      </li>
      <li>
        <a class="treeview-item {{ $page == 9 ? 'active' : '' }}" href="{{ route('contact.index') }}"   rel="noopener">
            <i class="icon far fa-circle"></i> Contact Info
        </a>
    </li>
    <li>
        <a class="treeview-item {{ $page == 10 ? 'active' : '' }}" href="{{ route('banner.index') }}"   rel="noopener">
            <i class="icon far fa-circle"></i> Banners
        </a>
    </li>
    </ul>
  </li>
  <li class="treeview {{ $area == 4 ? 'is-expanded' : '' }}">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-laptop"></i>
            <span class="app-menu__label">
               Home Page
            </span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>
  <ul class="treeview-menu">
    <li>
        <a class="treeview-item {{ $page == 11 ? 'active' : '' }}" href="{{ route('banner.create') }}">
            <i class="icon far fa-circle"> Slider</i> 
        </a>
    </li>
    <li>
        <a class="treeview-item {{ $page == 12 ? 'active' : '' }}" href="{{ route('home.create') }}">
            <i class="icon far fa-circle"></i> design home
        </a>
    </li>
    <li>
        <a class="treeview-item {{ $page == 13 ? 'active' : '' }}" href="{{ route('work-process.index') }}"  rel="noopener">
            <i class="icon far fa-circle"></i> Work Process
        </a>
    </li>

  </ul>
</li>
    <li class="treeview">
        <a class="app-menu__item {{ $area == 5 ? 'active' : '' }}" href="{{ route('contact.message') }}">
            <i class="app-menu__icon fa fa-laptop"></i>
            <span class="app-menu__label">
            Message 
            </span>
            @php
                $count = App\Models\Contact::where('status', 0)->count();
            @endphp
            <i class="">{{ $count ? $count : '' }}</i>
        </a>
    </li>
    
  </ul>
</aside>
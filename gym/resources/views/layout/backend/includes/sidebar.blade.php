@if(Request::segment(2) != 'ui-components') 
<div class="sidebar px-4 py-4 py-md-5 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <svg  width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
            </span>
            <span class="logo-text">{{config('app.name',':: MY TEXT ::')}}</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">

            <li><a class="m-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="icofont-home"></i> <span>Dashboard</span></a></li>

            <li class="collapsed">
                <a class="m-link {{request()->is('usermanagement*') ? 'active ' : '' }}" data-bs-toggle="collapse" data-bs-target="#usermanagement-Components" href="#">
                    <i class="fa fa-lock"></i> <span>User Managment</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse {{in_array(Request::segment(2),['permission','user','role'] )? 'show' : '' }}" id="usermanagement-Components">
                 @can('user.read')
                    <li><a class="ms-link {{ in_array(Request::segment(2),['user'] ) ? 'active' : '' }}" href="{{route('usermanagement.user.list')}}"> <span>Users</span></a></li>
                 @endcan
                    <li><a class="ms-link {{ in_array(Request::segment(2),['role'] ) ? 'active' : '' }}" href="{{route('usermanagement.role.list')}}"> <span>Roles</span></a></li>
				 @can('permission.read')
                    <li><a class="ms-link {{ in_array(Request::segment(2),['permission'] ) ? 'active' : '' }}" href="{{route('usermanagement.permission.list')}}"> <span>Permissions</span></a></li>
                 @endcan
                 
                </ul>
            </li>
            <li><a class="m-link {{ Request::segment(3) == 'alerts' ? 'active' : '' }}" href="#"><i class="icofont-paint"></i> <span>UI Components</span></a></li>
        </ul>


        
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
@endif

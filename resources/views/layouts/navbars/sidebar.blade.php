<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main" data-color="danger">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" {{ route('dashboard') }}">
            <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Heal as One: Facilitator</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-4">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    General
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-hospital-user {{ Route::currentRouteName() == 'dashboard' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'patients' ? 'active' : '' }}" href="{{ route('patients') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-bed {{ Route::currentRouteName() == 'patients' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">List of Patients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'provincial_data' ? 'active' : '' }}" href="{{ route('provincial_data') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe {{ Route::currentRouteName() == 'provincial_data' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">Provincial Data</span>
                </a>
            </li>
            @role('Developer|Administrator')
            <li class="nav-item mt-4">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Administrator
                </h6>
            </li>
            @role('Developer|Administrator')
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'manage_users' ? 'active' : '' }}" href="{{ route('manage_users') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-poo {{ Route::currentRouteName() == 'manage_users' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">Manage Users</span>
                </a>
            </li>
            @endrole
            @role('Developer|Administrator')
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'facilities' ? 'active' : '' }}" href="{{ route('facilities') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-clinic-medical {{ Route::currentRouteName() == 'facilities' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">List of Facilities</span>
                </a>
            </li>
            @endrole
            @role('Developer')
            <li class="nav-item mt-4">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Developer
                </h6>
            </li>
            @endrole
            @role('Developer')
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'manage_roles' ? 'active' : '' }}" href="{{ route('manage_roles') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-file-contract {{ Route::currentRouteName() == 'manage_roles' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">Manage Permissions</span>
                </a>
            </li>
            @endrole
            @role('Developer')
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'assign_roles' ? 'active' : '' }}" href="{{ route('assign_roles') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-paint-roller {{ Route::currentRouteName() == 'assign_roles' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">Role Assignment</span>
                </a>
            </li>
            @endrole
            @endrole
            <li class="nav-item mt-4">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    More
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'account_settings' ? 'active' : '' }}" href="{{ route('account_settings') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center  me-2 d-flex align-items-center justify-content-center">
                        <span class="fa fa-cog {{ Route::currentRouteName() == 'account_settings' ? 'text-white' : 'text-dark' }}"></span>
                    </div>
                    <span class="nav-link-text ms-1">Account Settings</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

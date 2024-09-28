<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="navbar-brand" href="/home"><span class="text-primary">One</span>-Health</a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">{{ __('messages.Navigation') }}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('add_doctor_view')}}">
              <span class="menu-icon">
                <i class="mdi mdi-plus"></i>
              </span>
                <span class="menu-title">{{ __('messages.Add Doctors') }}</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('add_med')}}">
              <span class="menu-icon">
                <i class="mdi mdi-plus"></i>
              </span>
                <span class="menu-title">{{ __('messages.Add Medicine') }}</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('showAppointments')}}">
              <span class="menu-icon">
              <span class="mdi mdi-clipboard-text-clock"></span>
              </span>
                <span class="menu-title">{{ __('messages.Appointments') }}</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('showDoctors')}}">
              <span class="menu-icon">
              <span class="mdi mdi-doctor"></span>
              </span>
                <span class="menu-title">{{ __('messages.Doctors') }}</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('showMed')}}">
              <span class="menu-icon">
              <span class="mdi mdi-medical-bag"></span>
              </span>
                <span class="menu-title">{{ __('messages.Medicines') }}</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('users')}}">
              <span class="menu-icon">
             <span class="mdi mdi-account-group"></span>
              </span>
                <span class="menu-title">{{ __('usersHome.users') }}</span>
            </a>
        </li>

    </ul>
</nav>


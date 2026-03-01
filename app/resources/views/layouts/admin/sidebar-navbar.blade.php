<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('backend')}}/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('backend')}}/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset('backend')}}/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <!-- Users Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <form action="{{route('admin.logout')}}" method="post">
                @csrf
            <button type="submit" class="dropdown-item">
              <i style="transform: rotate(180deg);" class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
            </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @php
      $sidebarAccent = @$generalSetting->site_color ?: '#2563eb';
  @endphp
  <style>
    .modern-sidebar {
      background: linear-gradient(180deg, #f8fbff 0%, #f0f5ff 46%, #f8f9fc 100%);
      border-right: 1px solid rgba(15, 23, 42, 0.08);
      box-shadow: 0 3px 10px rgba(15, 23, 42, 0.08) !important;
    }

    .modern-sidebar .brand-link {
      border-bottom: 1px solid rgba(15, 23, 42, 0.08);
      padding: 0.95rem 0.95rem 0.85rem;
    }

    .modern-sidebar .brand-title {
      font-size: 1.05rem;
      font-weight: 700;
      color: #0f172a;
      margin: 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .modern-sidebar .nav-header.sidebar-label {
      color: #64748b;
      font-size: 0.64rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      font-weight: 500;
      padding: 1rem 1rem 0.45rem;
    }

    .modern-sidebar .nav-sidebar .nav-link {
      margin: 0.13rem 0.6rem;
      border-top-left-radius: 0.60rem;
      color: #334155;
      font-weight: 400;
      font-size: 0.88rem;
      padding: 0.40rem 0.62rem;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 0.4rem;
      border-bottom-left-radius: 0.60rem;
    }

    .modern-sidebar .nav-sidebar .nav-link .nav-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 1.8rem;
      height: 1.8rem;
      border-radius: 0.62rem;
      margin: 0;
      color: #334155;
      background: #ffffff;
      box-shadow: 0 6px 14px rgba(15, 23, 42, 0.08);
      font-size: 0.90rem;
    }

    .modern-sidebar .nav-sidebar .nav-link:hover {
      background: rgba(255, 255, 255, 0.8);
      transform: translateX(2px);
      color: #0f172a;
    }

    .modern-sidebar .nav-sidebar .nav-link:hover .nav-icon {
      color: #1D0786;
    }

    .modern-sidebar .nav-sidebar .nav-link.active {
      background: #ffffff;
      color: #1D0786;
      box-shadow: 0 3px 8px rgba(15, 23, 42, 0.08);
    }

    .modern-sidebar .nav-sidebar .nav-link.active .nav-icon {
      background: #eff6ff;
      color: #1D0786;
      box-shadow: 0 2px 6px rgba(15, 23, 42, 0.05);
    }

    .modern-sidebar .menu-soon {
      font-size: 0.64rem;
      font-weight: 700;
      text-transform: uppercase;
      padding: 0.22rem 0.36rem;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.08);
      color: #475569;
      margin-left: auto;
    }
  </style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4 modern-sidebar">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <h4 class="brand-title">
        {{ @$generalSetting->site_name ?? 'Kommerce' }}
      </h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2 pb-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-header sidebar-label">{{ __('Overview') }}</li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif">
              <i class="nav-icon fas fa-th-large"></i>
              <p>{{ __('Dashboard') }}</p>
            </a>
          </li>

          <li class="nav-header sidebar-label">{{ __('Students Panel') }}</li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>{{ __('Student Admission') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>{{ __('Batches') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>{{ __('Attendance System') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>{{ __('Student Directory') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>

          <li class="nav-header sidebar-label">{{ __('Finance & Billing') }}</li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>{{ __('Monthly Fee Tracking') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>{{ __('Payment Collection') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>{{ __('Expense Tracking') }}</p>
              <span class="menu-soon">{{ __('Soon') }}</span>
            </a>
          </li>

          <li class="nav-header sidebar-label">{{ __('Settings') }}</li>
          <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link @if(request()->routeIs('admin.settings')) active @endif">
              <i class="nav-icon fas fa-cog"></i>
              <p>{{ __('System Settings') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.general.settings') }}" class="nav-link @if(request()->routeIs('admin.general.settings')) active @endif">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>{{ __('General Settings') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.email.settings') }}" class="nav-link @if(request()->routeIs('admin.email.settings')) active @endif">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>{{ __('Email Settings') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.languages') }}" class="nav-link @if(request()->is('admin/languages*')) active @endif">
              <i class="nav-icon fas fa-language"></i>
              <p>{{ __('Language Management') }}</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

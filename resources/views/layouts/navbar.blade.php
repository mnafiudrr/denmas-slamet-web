
<nav 
  class="
    @hasSection('navbar-class')
      @yield('navbar-class')
    @else
      navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
    @endif
  "

  id="
    @hasSection('navbar-id')
      @yield('navbar-id')
    @else
      navbarBlur
    @endif
  "

  navbar-scroll="
    @hasSection('navbar-scroll')
      @yield('navbar-scroll')
    @else
      true
    @endif
  ">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li> --}}
          <li class="breadcrumb-item text-sm @hasSection('navbar-class') text-white @else text-dark @endif active" aria-current="page">@yield('title')</li>
        </ol>
        <h6 class="@hasSection('navbar-class') text-white @endif font-weight-bolder mb-0">@yield('title')</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          {{-- <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div> --}}
        </div>
        <ul class="navbar-nav  justify-content-end">
          {{-- <li class="nav-item d-flex align-items-center">
            <a class="btn @hasSection('navbar-class') btn-outline-white @else btn-outline-primary @endif btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard">Online Builder</a>
          </li> --}}
          @guest
            <li class="nav-item d-flex align-items-center">
              <a href="{{ route('login') }}" class="nav-link @hasSection('navbar-class') text-white @else text-body @endif font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
          @endguest
          @auth
            {{-- <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link @hasSection('navbar-class') text-white @else text-body @endif p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li> --}}
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="{{ route('user.show', auth()->user()->username) }}">{{ auth()->user()->username }}</a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="{{ route('logout') }}" class="nav-link @hasSection('navbar-class') text-white @else text-body @endif p-0" >
                <i class="fas fa-sign-out-alt"></i>
              </a>
            </li>
            {{-- <li class="nav-item pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link @hasSection('navbar-class') text-white @else text-body @endif p-0" id="profilesButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
              </a>
              @include('layouts.features.profiles')
            </li> --}}
            {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link @hasSection('navbar-class') text-white @else text-body @endif p-0" id="notificationsButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              @include('layouts.features.notifications')
            </li> --}}
          @endauth
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
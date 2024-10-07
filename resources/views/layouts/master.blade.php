<!DOCTYPE html>
<html lang="en">

<head>
  @php
    use illuminate\Support\Facades\Route;
    $currentRoute = Route::currentRouteName();
  @endphp
  @include('layouts.head')
  @yield('head')
</head>

<body class="g-sidenav-show  bg-gray-100">

  {{-- check is path route contains template --}}
  @if (str_contains($currentRoute, 'template'))
    @include('layouts.templates.aside')
  @else
    @include('layouts.aside')
  @endif


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    @include('layouts.navbar')

    @hasSection('page-header')
      <div class="container-fluid">
        @yield('page-header')
      </div>
    @endif

    <div class="container-fluid py-4">
      @yield('content')
      @include('layouts.footer')
    </div>

  </main>

  @include('layouts.fixed-plugin')
  @include('layouts.script')

  @stack('script')

</body>

</html>
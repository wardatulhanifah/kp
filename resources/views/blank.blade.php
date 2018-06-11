<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  
  <title>{{ config('app.name') }}</title>
  <!-- Icons-->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/pace.css') }}" rel="stylesheet">
  <!-- Main styles for this application-->
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  
  @include('partials.header')
  
  <div class="app-body">
    
    @include('partials.sidebar')
    
    <main class="main">

      <!-- Breadcrumb-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
        
          @yield('breadcrumb')
      
        </li>
      </ol>

      <!-- Main Content -->
      <div class="container-fluid">
        <div class="animated fadeIn">

          @include('partials.errors')
          
          @yield('content')
          
        </div>
      </div>

    </main>
  </div>
  @include('partials.footer')
  <!-- Bootstrap and necessary plugins-->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/pace.min.js') }}"></script>

  {{-- @include('toast::messages-jquery') --}}

  @stack('javascript')
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">

  @include('admin.includes.head');

  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      @include('admin.includes.sidebar')
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            @include('admin.includes.header')
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
            @include('admin.includes.navbar')
          <!-- End Navbar -->
        </div>

        <!-- Container -->
          @yield('content')
        <!-- Container -->

        <!-- Footer -->
          @include('admin.includes.footer')
        <!-- Footer -->
      </div>

      <!-- Foot -->
        @include('admin.includes.foot')
      <!-- Foot -->
    
  </body>
</html>

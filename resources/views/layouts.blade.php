<!DOCTYPE html>
<html lang="zxx">

@include('includes.header')

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('includes.menu')
    @include('includes.fileproduct')
    @yield('content')
  
    @include('includes.footer')
</body>

</html>
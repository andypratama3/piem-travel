<!DOCTYPE html>
<html lang="en">
  <head>
    @include('landing.layouts.partials.head')
  </head>
  <body>
    @include('landing.layouts.partials.navbar')
    @yield('content')
    @include('landing.layouts.partials.script')
  </body>
</html>
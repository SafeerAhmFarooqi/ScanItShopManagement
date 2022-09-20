<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @section('master-head')
        @include('app-master-elements.master-head')    
        @show
        @yield('theme-head')
    </head>
    <body @yield('master-body-attributes')>
        @yield('theme-content')
        @yield('theme-script')
        @section('master-script')
        @include('app-master-elements.master-script')    
        @show
    </body>
</html>

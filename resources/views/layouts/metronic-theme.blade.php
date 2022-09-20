@extends('layouts.master-layout')
@section('theme-head')
    @include('metronic-theme.head')
@endsection
@section('master-body-attributes')
    @section('theme-body-attributes')
    id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"
    @show
@endsection
@section('theme-content')
    @yield('body-content')
@endsection
@section('theme-script')
    @include('metronic-theme.script')
@endsection
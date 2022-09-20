@extends('layouts.metronic-theme')
@section('body-content')
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        @include("includes.sidebar")

        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            @include("includes.topbar")

            <!--end::Header-->
            <!--begin::Content-->
            @yield("page-content")
            <!--end::Content-->
            <!--begin::Footer-->
            @include("includes.footer")

            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
@endsection
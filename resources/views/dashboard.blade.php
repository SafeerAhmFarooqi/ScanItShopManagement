@extends('dashboard-layout')
@section('page-content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <b>
                
               
                        Shop Management System
              
       
                </b>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->

    {{-- <div class="container mb-4">
        <div class="alert alert-warning" role="alert">
            Please complete your profile by clicking
            <a href="#" class="alert-link"> here</a>.
        </div>
    </div> --}}




    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->

        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->

          
            
                
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-md-5 mb-xl-5">
                                <!--begin::Card widget 4-->
                                <a href="#">
                                    <div class="card card-flush h-md-20 mb-5 mb-xl-5">
                                        <!--begin::Header-->
                                        <div class="card-header pt-5" style="background-color: #a640b883;">
                                            <!--begin::Title-->
                
                                            <!--begin::Info-->
                                            <div class="align-items-center pt-6 pb-10">
                                                <span class="fs-2hx fw-bolder me-2 lh-1" style="color:#fff">{{$count??''}}</span><br>
                                                <span style="color:#fff">Total Products</span>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Subtitle-->
                                            <span style="padding-bottom:10px;" class="text-gray-400 pt-1 fw-bold fs-6"> <i style="font-size: 70px;color: #fff;" class="fa-solid fa-store"></i></span>
                                            <!--end::Subtitle-->
                
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                
                                        <!--end::Card body-->
                                    </div>
                                </a>
                            </div>

                         
                            {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-md-5 mb-xl-5">
                                <!--begin::Card widget 4-->
                                
                                    <div class="card card-flush h-md-20 mb-5 mb-xl-5">
                                        <!--begin::Header-->
                                        <div class="card-header pt-5" style="background-color: #a640b883;">
                                            <!--begin::Title-->
                
                                            <!--begin::Info-->
                                            <div class="align-items-center pt-6 pb-10">
                                                <span class="fs-2hx fw-bolder me-2 lh-1" style="color:#fff">0</span><br>
                                                <span style="color:#fff">Close Orders</span>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Subtitle-->
                                            <span style="padding-bottom:10px;" class="text-gray-400 pt-1 fw-bold fs-6"> <i style="font-size: 70px;color: #fff;" class="fa-solid fa-dollar"></i></span>
                                            <!--end::Subtitle-->
                
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Header-->
                
                                        <!--end::Card body-->
                                    </div>
                                
                            </div> --}}
                        </div>
                
                
            <!--begin::Col-->

            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--end::Row-->
    </div>

    <!--end::Container-->
</div>
@endsection
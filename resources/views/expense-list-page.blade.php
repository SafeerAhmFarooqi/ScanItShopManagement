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
                
               
                        Shop Management - Expense List
              
       
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

            <div class="row g-6 g-xl-9 mb-8">
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Budget-->
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <h1 class="">Expense List <i class="fas fa-question-circle ms-2 fs-5 align-middle" data-bs-toggle="tooltip" title="" data-bs-original-title="Search/Filter/Export your Incident Report to show patterns of behavior"></i></h1>
                        </div>
                    </div>
                    <!--end::Budget-->
                </div>
            </div>
           
            {{-- <livewire:create-expense />  --}}



            <div class="card card-flush">
                <!--begin::Card header-->
             
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                 
    
     
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
     
            <!--begin::Content-->
            <div class="collapse show" id="kt_account_settings_profile_details">
                <!--begin::Form-->
                
    
     
     
    
    
    
    
    
    
        <div class="d-flex flex-column flex-lg-row mb-17" style="padding-top:50px">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-0 me-lg-20">
                <!--begin::Form-->
     
                         
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                        
                    <a href="{{route('app.expanse.show',[2])}}" class="btn btn-primary" type="submit">Create Expense</a>
                                        </div>
    
                     
              
                     
                                
            
    
    
    
                 <div class="card card-flush" style="padding-top:60px">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                        </div>
                        <!--end::Search-->
                        <!--begin::Export buttons-->
                        <div id="kt_ecommerce_report_views_export" class="d-none"></div>
                        <!--end::Export buttons-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                       
     
                        <!--end::Filter-->
                        <!--begin::Export dropdown-->
                        <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                                <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
                                <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Export Report</button>
                        <!--begin::Menu-->
                        <div id="kt_ecommerce_report_views_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to clipboard</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as Excel</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as CSV</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Export dropdown-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                 
    
           <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-start min-w-50px">Sr.No</th>
                                <th class="text-start min-w-50px">Date</th>
                                <th class="text-start min-w-50px">Expense Group</th>
                                <th class="text-start min-w-50px">Expense Head</th>
                                <th class="text-start min-w-50px">Rate</th>
                                <th class="text-start min-w-50px">Qty</th>
                                <th class="text-start min-w-50px">Total Value</th>
                                <th class="text-start min-w-50px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Table row-->
                            @foreach ($expenses as $expense)
                            <tr>
                                <!--begin::Product=-->
                              <td>{{$loop->iteration}}</td>
                              <td>{{$expense->dateofexpense->format('F d,y')}}</td>
                              <td>{{$expense->group->name}}</td>
                              <td>{{$expense->head}}</td>
                              <td>{{$expense->rate}}</td>
                              <td>{{$expense->quantity}}</td>
                              <td>{{$expense->amount}}</td>
                              
                                <td style="text-align:right">  
                                    {{-- <button class="btn btn-light btn-active-light-danger me-2" type="reset" style="font-size:8px" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_{{$expense->id}}">Delete </button> 
            
                                    <button class="btn btn-primary btn-active-light-primary me-2" type="reset" style="font-size:8px;" data-bs-toggle="modal" data-bs-target="#kt_modal_update_{{$expense->id}}">Update</button>     --}}
                            
                                 </td>
                                <!--end::Product=-->
                                <!--begin::SKU=-->
                                
                                <!--end::Percent=-->
                            </tr>
                            <div class="modal fade" tabindex="-1" id="kt_modal_delete_{{$expense->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">{{$expense->head}}	</h3>
                            
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <span class="svg-icon svg-icon-1"></span>
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <form action="{{route('app.expanse.destroy',[ 'expanse'=> $expense->id ])}}" method="POST">
                                            @csrf
                                            @method('delete')
                                           
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this </p>
                                        </div>
                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="modal fade" tabindex="-1" id="kt_modal_update_{{$expense->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">{{$expense->head}}</h3>
                            
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                <span class="svg-icon svg-icon-1"></span>
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <form action="{{route('app.expanse.update',[ 'expanse'=> $expense->id ])}}" method="POST">
                                            @csrf
                                            @method('put')
                                        <div class="modal-body">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                                <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="expense" placeholder="expense" type="text" value="{{$expense->head}}">
                                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                            </div>
                            
                            
                                        </div>
                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
                            
                            
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
    
    
    
    
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
    
    
    
    
    
    
            </div><!--end::Content-->
            <!--begin::Sidebar-->
         
        </div>
     
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
            </div><!--end::Content-->
        </div>
            
            
                
                      
        </div>
        <!--end::Row-->

        <!--end::Row-->
    </div>

    <!--end::Container-->
</div>
@endsection

@section('pageScripts')
<script src="{{asset('assets/Metronic-Theme/js/custom/apps/ecommerce/reports/views/views.js')}}"></script>
@endsection
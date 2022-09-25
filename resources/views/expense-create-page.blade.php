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
                
               
                        Shop Management - Create New Expanse
              
       
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
                            <h1 class="">Create Expense <i class="fas fa-question-circle ms-2 fs-5 align-middle" data-bs-toggle="tooltip" title="" data-bs-original-title="Search/Filter/Export your Incident Report to show patterns of behavior"></i></h1>
                        </div>
                    </div>
                    <!--end::Budget-->
                </div>
            </div>
           
            {{-- <livewire:create-expense />  --}}

            @include('common.validation')
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Heading-->
                   
                    <!--end::Heading-->
                    <!--begin::Toolbar-->
                    <form method="POST" action="{{route('app.expanse.store')}}">
                        @csrf
                        <div class="card-toolbar">
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                {{-- <h5>Expense Group</h5>
                                <select wire:model="expenseGroup" aria-hidden="true" aria-label="Select Floor" class="form-select form-select-solid form-select-lg fw-semibold"  data-kt-initialized="1" data-placeholder="Select Floor" data-select2-id="select2-data-10-ewc6" tabindex="-1">
                                    <option data-select2-id="select2-data-12-u8ev" value="" disabled>
                                        Select Group
                                    </option>
                                  @foreach ($expenseGroups as $expenseGroup)
                                  <option  value="{{$expenseGroup->id}}">
                                    {{$expenseGroup->name}}
                                </option>
                                  @endforeach
                                </select> 
                                @error('expenseGroup')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <!--end::Select-->
                            </div>
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                <h5>Date</h5>
                                <input type="date" wire:model="date" class="form-control form-control-lg form-control-solid">
                                @error('date')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <!--end::Select-->
                            </div>
            
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                <h5>Expense Head</h5>
                                <input type="text" wire:model="head" class="form-control form-control-lg form-control-solid">
                                @error('head')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <!--end::Select-->
                            </div>
                            <div class="my-1 me-4">
                                <h5>Rate</h5>
                                <input type="text" wire:model="rate" class="form-control form-control-lg form-control-solid">
                                @error('rate')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <!--end::Select-->
                            </div>
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                <h5>Quantity</h5>
                                <input type="text" wire:model="quantity" class="form-control form-control-lg form-control-solid">
                                @error('quantity')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <!--end::Select-->
                            </div>
                            <div class="my-1 me-4">
                                <!--begin::Select-->
                                <h5>Amount</h5>
                                <input type="text" wire:model="amount" class="form-control form-control-lg form-control-solid" disabled>
                                <!--end::Select-->
                            </div>
                            <div class="my-1 me-4 mt-8">
                                <!--begin::Select-->
                                <button type="submit" class="btn btn-primary">Add Expense</button>    <!--end::Select-->
                            </div> --}}
                            
                        
                            <!--begin::Repeater-->
              <div id="kt_docs_repeater_basic">
                <!--begin::Form group-->
                <div class="form-group">
                    <div data-repeater-list="kt_docs_repeater_basic">
                        <div data-repeater-item>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="form-label">Expense Group</label>
                                    {{-- <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name1" id="check1"/> --}}
                                    
                                    <select class="form-control mb-2 mb-md-0" placeholder="Expense Group" id="sel1" name="expensegroup">
                                      <option value="" disabled selected>Expense Group</option>
                                      @foreach ($expenseGroups as $expenseGroup)
                                        <option value="{{$expenseGroup->id}}">{{$expenseGroup->name}}</option>      
                                        @endforeach
                                       
                                  </select>
                                  </div>
                                <div class="col-md-2">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control mb-2 mb-md-0" placeholder="Date" name="date"/>
                               
                                  </div>
                                  <div class="col-md-2">
                                    <label class="form-label">Expense Head</label>
                                    <input type="text" class="form-control mb-2 mb-md-0" placeholder="Expense Head" name="expensehead"/>
                               
                                  </div>
                                  <div class="col-md-2">
                                    <label class="form-label">Rate</label>
                                    <input type="number" class="form-control mb-2 mb-md-0" placeholder="Rate" name="rate" id="rate" />
                               
                                  </div>
                                  <div class="col-md-2">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control mb-2 mb-md-0" placeholder="Quantity" name="quantity" id="quantity" />
                               
                                  </div>
                                  <div class="col-md-2">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control mb-2 mb-md-0" placeholder="Amount" name="amount" id="amount"/>
                               
                                  </div>
                                  
                                  
                                
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>Delete
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <!--end::Form group-->
            
                <!--begin::Form group-->
                <div class="form-group mt-5">
                    <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                        <i class="la la-plus"></i>Add
                    </a>
                </div>
                <!--end::Form group-->
            </div>
            <!--end::Repeater-->
            <div class="my-1 me-4 mt-8">
                <!--begin::Select-->
                <button type="submit" class="btn btn-primary">Save</button>    <!--end::Select-->
            </div>
                            {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
                        </div>
                    </form>
                   
                    
                    <!--end::Toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                
        
        
        
                
                <!--end::Card body-->
            </div>
            
            
                
                      
        </div>
        <!--end::Row-->

        <!--end::Row-->
    </div>

    <!--end::Container-->
</div>
@endsection

@section('pageScripts')
<script src="{{asset('assets/Metronic-Theme/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/Metronic-Theme/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<script src="{{asset('assets/Metronic-Theme/js/custom/documentation/documentation.js')}}"></script>
		<script src="{{asset('assets/Metronic-Theme/js/custom/documentation/search.js')}}"></script>
{{-- <script src="{{asset('assets/Metronic-Theme/js/custom/documentation/forms/formrepeater/basic.js')}}"></script> --}}
<script>
  "use strict";
  var inputOrder=3;
  var KTFormRepeaterBasic={
    init:function(){
      $("#kt_docs_repeater_basic").repeater({initEmpty:!1,defaultValues:{"text-input":"foo"},
  show:function(){
    $(this).slideDown();
    $('input').on('input', function(e){
        //alert($('input').eq(1).val());
        $('input').eq(inputOrder+2).val($('input').eq(inputOrder).val()*$('input').eq(inputOrder+1).val());
        
       // alert(inputOrder);
    });
    inputOrder+=5;
},
  hide:function(t){$(this).slideUp(t);
    inputOrder-=5;
}})}};
  KTUtil.onDOMContentLoaded((function(){KTFormRepeaterBasic.init();
//alert('safeer');
$('input').on('input', function(e){
        //alert($('input').eq(1).val());
        $('input').eq(5).val($('input').eq(3).val()*$('input').eq(4).val());
    });
}));
  
</script>

@endsection
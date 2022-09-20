<div>
    {{-- Stop trying to control. --}}

    <div>
        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication - Sign-up -->
            <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
                <!--begin::Content-->
                
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <!--begin::Logo-->
                    
                    <!--end::Logo-->
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        @include('common.validation')
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" wire:submit.prevent="submit">
                            @csrf
                            <!--begin::Heading-->
                            <div class="mb-10 text-center">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Add New Rent Bill</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                             
                                <!--end::Link-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Action-->
                         
                            <!--end::Action-->
                            <!--begin::Separator-->
                            <div class="d-flex align-items-center mb-10">
                                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                                
                                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            </div>
                            <!--end::Separator-->
                            <!--begin::Input group-->
                          
                            <!--end::Input group-->
                            <!--begin::Input group-->
    
                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Area/Mall - {{$selectedArea}}</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <select wire:model="selectedArea" aria-hidden="true" aria-label="Select Area/Mall" class="form-select form-select-solid form-select-lg fw-semibold" data-control="select2" data-kt-initialized="1" data-placeholder="Select Area/Mall" data-select2-id="select2-data-10-ewc6" name="area" tabindex="-1" >
                                        <option data-select2-id="select2-data-12-u8ev" value="">
                                            Select Area/Mall...
                                        </option>
                                      @foreach ($areas as $area)
                                      <option  value="{{$area->id}}">
                                        {{$area->area}}
                                    </option>
                                      @endforeach
                                    </select> 
                                    @error('selectedArea')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>
    
                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Floor</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <select wire:model="selectedFloor" aria-hidden="true" aria-label="Select Floor" class="form-select form-select-solid form-select-lg fw-semibold" data-control="select2" data-kt-initialized="1" data-placeholder="Select Floor" data-select2-id="select2-data-10-ewc6" tabindex="-1">
                                        <option data-select2-id="select2-data-12-u8ev" value="" disabled>
                                            Select Floor
                                        </option>
                                      @foreach ($floors as $floor)
                                      <option  value="{{$floor->id}}">
                                        {{$floor->name}}
                                    </option>
                                      @endforeach
                                    </select> 
                                    @error('selectedFloor')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>

                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Shop Number</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <select wire:model="selectedShop" aria-hidden="true" aria-label="Shop Number" class="form-select form-select-solid form-select-lg fw-semibold" data-control="select2" data-kt-initialized="1" data-placeholder="Select Floor" data-select2-id="select2-data-10-ewc6" tabindex="-1">
                                        <option data-select2-id="select2-data-12-u8ev" value="" disabled>
                                            Select Shop
                                        </option>
                                      @foreach ($shops as $shop)
                                      <option  value="{{$shop->id}}">
                                        {{$shop->shopno}}
                                    </option>
                                      @endforeach
                                    </select> 
                                    @error('selectedShop')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>
    
                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Customer Name</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <h5>{{$rentalCustomer->name??''}}</h5>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>
    
                            <div class="row mb-6" wire:ignore >
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Pick Month</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div >
                                        <div id="mmp" wire:click="getMonths"></div>
                                        {{-- <button id="ok">OK</button> --}}
                                    </div>

                                    {{-- @error('rentAmount')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror --}}
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>

                           

                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Rent Amount</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    
                                  <h1>{{$rentAmount=(($shops->find($selectedShop))->shoprent??0)*(float)($selectedMonths)}}</h1>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>
                           
                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Collected Rent</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Collected Rent" wire:model="collectedRent"/>
                                    @error('collectedRent')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>

                            <div class="row mb-6">
                                <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Note</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                                 <!--begin::Col-->
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Note" wire:model="note"/>
                                    @error('note')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div><!--end::Col-->
                            </div>
                            
                           
                       
                        
                      
                         
    
                          
    
                         
    
                       
                            <!--end::Input group-->
                            <!--begin::Input group-->
                          
                            <!--end::Input group=-->
                            <!--begin::Input group-->
                          
                            <!--end::Input group-->
                            <!--begin::Input group-->
                           
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="submit"  class="btn btn-lg btn-primary">
                                    <span class="indicator-label">Add</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
               
                <!--end::Footer-->
            </div>
            <!--end::Authentication - Sign-up-->
        </div>
    </div>
</div>

@section('pageStyles')
<link href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('pageScripts')
{{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>	 --}}
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<script src="{{asset('assets/datepicker/jqm-mmp.js')}}"></script>

	<script>
	$(document).ready(function() {
        
        //alert('safeer');
        $('#mmp').mmp();

		// $('#ok').click(function () {
		// 	alert($('#mmp').mmp('value'));
        //     const fruits = $('#mmp').mmp('value');
        //     let text = fruits.toString();
        //     @this.set('selectedMonths', text);

		// });

		// $('#load').click(function () {
		// 	$('#mmp').mmp('value', ['2014-01', '2014-05', '2014-08']);
		// });
       
	});
	</script>

<script> 
    window.addEventListener('getCalendar', event => {
       //  alert(JSON.stringify(event.detail.name));
       //   alert("Hello! I am an alert box!");
  //     alert('check 1');
         var locations = event.detail.months;
         var monthsCalculation=$('#mmp').mmp('value');
           @this.set('selectedMonths', monthsCalculation.length);  
//alert(monthsCalculation);

})
</script>  


    

<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('component.initialized', (component) => {
           // alert('alert 1');
        })
        Livewire.hook('element.initialized', (el, component) => {
          //  alert('alert 2');
        })
        Livewire.hook('element.updating', (fromEl, toEl, component) => {
           // alert('alert 3');
        })
        Livewire.hook('element.updated', (el, component) => {
           // alert('alert 4');
        })
        Livewire.hook('element.removed', (el, component) => {
          //  alert('alert 5');
        })
        Livewire.hook('message.sent', (message, component) => {
           // alert('alert 6');
        })
        Livewire.hook('message.failed', (message, component) => {
          //  alert('alert 7');
        })
        Livewire.hook('message.received', (message, component) => {
            //alert('alert 8');
        })
        Livewire.hook('message.processed', (message, component) => {
           // alert('alert 9');
           

        })
    });
</script>
@endsection




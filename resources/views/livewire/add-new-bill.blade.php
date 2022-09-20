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


@push('scriptsWithLivewire')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>	
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    
    <script>
        document.addEventListener('livewire:load', function() {
            (function ($, window, document, undefined) {
    $.widget("mobile.mmp", $.mobile.widget, {
        options:{
            text:'Multiple Month Picker',
            theme:'a',
            id:'mmp',
			months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			value: []
        },
		value: function (value) {
			if ( value === undefined ) {
				return this.options.value;
			}
	 
			this.options.value = value;
			this._values = ',' + value.join(',') + ',';
			this._check();
		},
		_currentYear: (new Date()).getFullYear(),
		_values : ',',
		_check: function() {
			var that = this;
			this.element.find('input').each(function() {
				if(that._values.indexOf(',' + $(this).val() + ',') >= 0) {
					$(this).prop('checked', true).checkboxradio('refresh');
				} else {
					$(this).prop('checked', false).checkboxradio('refresh');
				}
			});
		},
        _create:function () {
            this.element.css('text-align', 'center');
			
			this.element.append('<div id="mmp-header" data-role="controlgroup" data-type="horizontal"></div>');
			this.element.children('div').append('<button id="btnPreviousYear" data-iconpos="notext" data-icon="arrow-l">Previous year</button>');
			this.element.children('div').append('<button id="yearLabel" style="width: 150px;">' + this._currentYear + '</button>');
			this.element.children('div').append('<button id="btnNextYear" data-iconpos="notext" data-icon="arrow-r">Next year</button>');
			
			for(var i=0; i<4; i++) {
				this.element.append('<fieldset id="mmp-months-row-' + i + '" data-role="controlgroup" data-type="horizontal"></fieldset>');
				for(var j=0; j<3; j++) {
					var month = this._currentYear + '-' + this._zeros(1 + j + 3*i, 2);
					this.element.find('#mmp-months-row-' + i).append('<input type="checkbox" name="' + month + '" id="' + month + '" value="' + month + '" data-wrapper-class="mmp-month" />');
					this.element.find('#mmp-months-row-' + i).append('<label for="' + month + '" style="width: text-align: center;">' + this.options.months[j + 3*i] + '</label>');
				}
			}
			
			$('<style>.mmp-month { width: 100px; }</style>').appendTo('head');
			$('<style>.mmp-month > label { text-align: center; }</style>').appendTo('head');
			
			$('body').trigger('create');
			
			var that = this;
			
			this.element.find('#btnPreviousYear').click(function() {
				that._currentYear--;
				that.element.html('');
				that._create();
			});
			
			this.element.find('#btnNextYear').click(function() {
				that._currentYear++;
				that.element.html('');
				that._create();
			});
			
			this.element.children('fieldset').find('label').css('text-align', 'center');
			this.element.children('fieldset').find('input').click(function() {
				var value = $(this).val();
				if($(this).is(':checked')) {
					if(that._values.indexOf(',' + value + ',') < 0) {
						that._values += value + ',';
					}
				} else {
					if(that._values.indexOf(',' + value + ',') >= 0) {
						that._values = that._values.replace(',' + value + ',', ',');
					}
				}
				if(that._values == ',') {
					that.options.value = [];
				} else {
					that.options.value = that._values.substring(1, that._values.length - 1).split(',');
					that.options.value.sort();
				}
			});
			
			this._check();
        },
		_zeros: function(text, size) {
			var temp = text + '';
			while(temp.length < size) {
				temp = '0' + temp;
			}
			return temp;
		}
    });
})(jQuery, window, document);


$(document).ready(function() {
        
    $('#mmp').mmp();

    
   
});

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
    <link href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css" />
@endpush



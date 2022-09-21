<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h3>Select</h3>
            </div>
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">Mall</label>
                    <select wire:model="selectedArea" class="form-select form-select-sm form-select-solid w-150px" data-placeholder="Select Mall" data-hide-search="true">
                        <option  selected="selected" disabled>Select Mall</option>
                        @foreach ($areas as $area)
                                      <option  value="{{$area->id}}">
                                        {{$area->area}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">Floor</label>
                    <select wire:model="selectedFloor" class="form-select form-select-sm form-select-solid w-150px"  data-placeholder="Select Floor" data-hide-search="true">
                        <option value="" selected="selected" disabled>Select Floor</option>
                        @foreach ($floors as $floor)
                        <option  value="{{$floor->id}}">
                          {{$floor->name}}
                      </option>
                        @endforeach
                    </select>
                    <!--end::Select-->
                </div>

                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">Shop</label>
                    <select wire:model="selectedShop" class="form-select form-select-sm form-select-solid w-150px" data-placeholder="Select Mall" data-hide-search="true">
                        <option value="" selected="selected" disabled>Select Shop</option>
                        @foreach ($shops as $shop)
                        <option  value="{{$shop->id}}">
                          {{$shop->shopno}}
                      </option>
                        @endforeach
                    </select>
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">From Month</label>
                    <input type="month" class="form-control form-control-lg form-control-solid" wire:model="selectedFromMonth">
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">To Month</label>
                    <input type="month" class="form-control form-control-lg form-control-solid" wire:model="selectedToMonth">
                    <!--end::Select-->
                </div>
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <a href="javascript:;" wire:click="$set('generateReport', true)" class="btn btn-primary">Generate Report</a>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        



        
        <!--end::Card body-->
    </div>
@if ($rentalCustomer)
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
     
        <!--end::Heading-->
        <!--begin::Toolbar-->
        <div class="card-title">
            <h3>Shop Rental Name : {{$rentalCustomer->name??''}} </h3>
         
        </div>
      
        <!--end::Toolbar-->
    </div>
    <div class="card-header">
        <!--begin::Heading-->
     
        <!--end::Heading-->
        <!--begin::Toolbar-->
        
        <div class="card-title">
            <h3>Cut Off Payment : {{$rentalCustomer->cutoffpayment??''}}</h3>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                    <tr>
                        <th class="min-w-250px">Date</th>
                        <th class="min-w-250px">Shop Number</th>
                        <th class="min-w-250px">Rent Per Month</th>
                        <th class="min-w-250px">Month Name</th>
                        <th class="min-w-250px">Payment Status</th>
                        <th class="min-w-250px">Paid Amount</th>
                        <th class="min-w-250px">Due Amount</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-bold text-gray-600">
                  
                  @foreach ($bills as $bill)
                  <tr>
                    <td>{{$bill->created_at->format('F d,y')??''}}</td>
                    <td>{{$bill->shop->shopno??''}}</td>
                    <td>{{$bill->shop->shoprent??''}}</td>
                    <td>{{$bill->created_at->format('F')??''}}</td>
                    <td>{{$bill->rentamount==0?'Unpaid' : ($bill->rentamount>0&&$bill->rentamount<$bill->shop->shoprent? 'Partial Paid' : 'Paid')}}</td>
                    <td>{{$bill->rentamount??''}}</td>
                    <td>{{$bill->shop->shoprent-$bill->rentamount}}</td>
                </tr>    
                  @endforeach
                   
                     
          
                       
                  
                    
                    
                   
                   
                  
                </tbody>
                <!--end::Tbody-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>

  



    
    <!--end::Card body-->
</div>

<div class="card card-flush mb-xxl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark">Total Calculations</span>
            <span class="text-gray-400 pt-2 fw-bold fs-6"></span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
       
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Nav-->
      
        <!--end::Nav-->
        <!--begin::Tab Content-->
        <div class="tab-content">
            <!--begin::Tap pane-->
            <div class="tab-pane fade show active" id="kt_stats_widget_1_tab_1">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle gs-0 gy-4 my-0">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fs-7 fw-bolder text-gray-500">
                                <th class="p-0 min-w-150px d-block pt-3"></th>
                                <th class="text-end min-w-140px pt-3">Amount</th>
                                <th class="pe-0 text-end min-w-120px pt-3">Total</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            <tr>
                                <td>
                                    <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Advance Payment</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$rentalCustomer->advancepayment??''}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Monthly Cut Off Payment</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-primary fs-7 fw-bolder">{{$rentalCustomer->cutoffpayment??''}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Rented On</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$rentalCustomer->created_at->format('F d,Y')}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Months</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now())}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Paid From Advance Payment</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{($rentalCustomer->advancepayment-(($rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now()))*$rentalCustomer->cutoffpayment))<=0?$rentalCustomer->advancepayment : ($rentalCustomer->advancepayment-($rentalCustomer->advancepayment-(($rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now()))*$rentalCustomer->cutoffpayment)))}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6">{{($rentalCustomer->advancepayment-(($rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now()))*$rentalCustomer->cutoffpayment))<=0?$rentalCustomer->advancepayment : ($rentalCustomer->advancepayment-($rentalCustomer->advancepayment-(($rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now()))*$rentalCustomer->cutoffpayment)))}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Remaining Advance Payment</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$rentalCustomer->advancepayment-(($rentalCustomer->advancepayment-(($rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now()))*$rentalCustomer->cutoffpayment))<=0?$rentalCustomer->advancepayment : ($rentalCustomer->advancepayment-($rentalCustomer->advancepayment-(($rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now()))*$rentalCustomer->cutoffpayment))))}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Rent Bills Paid In {{$rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now())}} Months</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$bills->sum('rentamount')}}</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6">{{$bills->sum('rentamount')}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Subject Rent Amount In {{$rentalCustomer->created_at->diffInMonths(\Carbon\Carbon::now())}} Months</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$rentalCustomer->shop->shoprent}}1</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6">{{$bills->sum('rentamount')}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Best Headsets Giveaway</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-warning fs-7 fw-bolder">In Queue</span>
                                </td>
                                <td class="text-end">
                                    <span class="text-gray-800 fw-bolder d-block fs-6">0%(0)</span>
                                </td>
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Tap pane-->
            <!--begin::Tap pane-->
           
            <!--end::Tap pane-->
            <!--begin::Tap pane-->
         
            </div>
            <!--end::Tap pane-->
            <!--begin::Tap pane-->
          
            <!--end::Tap pane-->
        </div>
        <!--end::Tab Content-->
    </div>
    <!--end: Card Body-->
</div>
@endif

   
</div>

<div>
   
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
                    <label for="">From</label>
                    <input type="date" class="form-control form-control-lg form-control-solid" wire:model="selectedFromDate">
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">To</label>
                    <input type="date" class="form-control form-control-lg form-control-solid" wire:model="selectedToDate">
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">Shop</label>
                    <select wire:model="selectedShop" class="form-select form-select-sm form-select-solid w-150px" data-placeholder="Select Mall" data-hide-search="true" multiple>
                        <option value="" selected="selected">Select Shop</option>
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
                    <label for="">Floor</label>
                    <select wire:model="selectedFloor" class="form-select form-select-sm form-select-solid w-150px"  data-placeholder="Select Floor" data-hide-search="true" multiple>
                        <option value="" selected="selected">Select Floor</option>
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
                    <label for="">Mall - {{$selectedArea}}</label>
                    <select wire:model="selectedArea" class="form-select form-select-sm form-select-solid w-150px" data-placeholder="Select Mall" data-hide-search="true">
                        <option  selected="selected">Select Mall</option>
                        @foreach ($areas as $area)
                                      <option  value="{{$area->id}}">
                                        {{$area->area}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
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
                            <th class="min-w-250px">Id</th>
                            <th class="min-w-250px">Shop Number</th>
                            <th class="min-w-250px">Shop Rental Name</th>
                            <th class="min-w-250px">Rent Collection Date</th>
                            <th class="min-w-250px">Payment Month Status</th>
                            <th class="min-w-250px">Total Bills Paid</th>
                            <th class="min-w-250px">Paid Till Today</th>
                            <th class="min-w-250px">Due Till Today</th>
                            <th class="min-w-250px">Rented Since</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                        @if ($rentalCustomers->count())
                        @foreach ($rentalCustomers as $rentalCustomer)
                        <tr>
                            <td>{{$rentalCustomer->id}}</td>
                            <td>{{$rentalCustomer->shop->shopno}} </td>
                            <td>{{$rentalCustomer->name}}</td>
                            <td>{{$this->getRentCollectionDate($rentalCustomer->id)}}</td>
                            <td>{{$this->getPaymentMonthStatus($rentalCustomer->id)->message}}</td>
                            <td>{{$this->getTotalBillsPaid($rentalCustomer->id,$selectedFromDate,$selectedToDate)}}</td>
                            <td>{{$this->getTotalPaidTillToday($rentalCustomer->id)}}</td>
                            <td>{{$this->getDueAmount($rentalCustomer->id)}}</td>
                            <td>{{$rentalCustomer->created_at->format('F d,Y')}}</td>
                        </tr>    
                        @endforeach    
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h1>No Results Found</h1>
                                </td>
                            </tr>
                        @endif
                        
                        
                       
                       
                      
                    </tbody>
                    <!--end::Tbody-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>



        
        <!--end::Card body-->
    </div>

    <div class="card mb-5 mb-xl-10">
        <!--begin::Body-->
        <div class="card-body py-10">
            <h2 class="mb-9">Report</h2>
            <!--begin::Overview-->
            <div class="row mb-10">
                <!--begin::Col-->
                {{-- <div class="col-xl-6 mb-15 mb-xl-0 pe-5">
                    <h4 class="mb-0">How to use Referral Program</h4>
                    <p class="fs-6 fw-bold text-gray-600 py-4 m-0">Use images to enhance your post, improve its flow, add humor
                    <br />and explain complex topics</p>
                    <a href="#" class="btn btn-light btn-active-light-primary fw-bolder">Get Started</a>
                </div> --}}
                <!--end::Col-->
                <!--begin::Col-->
                {{-- <div class="col-xl-6">
                    <h4 class="text-gray-800 mb-0">Your Referral Link</h4>
                    <p class="fs-6 fw-bold text-gray-600 py-4 m-0">Plan your blog post by choosing a topic, creating an outline conduct
                    <br />research, and checking facts</p>
                    <div class="d-flex">
                        <input id="kt_referral_link_input" type="text" class="form-control form-control-solid me-3 flex-grow-1" name="search" value="https://keenthemes.com/reffer/?refid=345re66787k8" />
                        <button id="kt_referral_program_link_copy_btn" class="btn btn-light btn-active-light-primary fw-bolder flex-shrink-0" data-clipboard-target="#kt_referral_link_input">Copy Link</button>
                    </div>
                </div> --}}
                <!--end::Col-->
            </div>
            <!--end::Overview-->
            <!--begin::Stats-->
            <div class="row">
                <!--begin::Col-->
                <div class="col">
                    <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                        <span class="fs-4 fw-bold text-info pb-1 px-2">Collected Rents</span>
                        <span class="fs-4 fw-bold text-info pb-1 px-5">{{\Carbon\Carbon::parse($selectedFromDate)->format('F d,y')}} to {{\Carbon\Carbon::parse($selectedToDate)->format('F d,y')}}</span>
                        <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">$
                            <span>{{$mallRentsCollected}}</span></span>
                        {{-- <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">$
                        <span data-kt-countup="true" data-kt-countup-value="63,240.00">0</span></span> --}}
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col">
                    <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                        <span class="fs-4 fw-bold text-success pb-1 px-2">Due Rents</span>
                        <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">$
                        <span >0</span></span>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col">
                    <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                        <span class="fs-4 fw-bold text-danger pb-1 px-2">Total Shops</span>
                        <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                        <span >{{$shops->count()}}</span></span>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col">
                    <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                        <span class="fs-4 fw-bold text-primary pb-1 px-2">Total Floors</span>
                        <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                        <span >{{$floors->count()}}</span></span>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Stats-->
            <!--begin::Info-->
            {{-- <p class="fs-5 fw-bold text-gray-600 py-6">Writing headlines for blog posts is as much an art as it is a science, and probably warrants its own post, but for now, all I’d advise is experimenting with what works for your audience, especially if it’s not resonating with your audience</p> --}}
            <!--end::Info-->
            <!--begin::Notice-->
            {{-- <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="black" />
                        <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
                    <div class="mb-3 mb-md-0 fw-bold">
                        <h4 class="text-gray-900 fw-bolder">Withdraw Your Money to a Bank Account</h4>
                        <div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank account. Commision is $25 per transaction under $50,000</div>
                    </div>
                    <!--end::Content-->
                    <!--begin::Action-->
                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Withdraw Money</a>
                    <!--end::Action-->
                </div>
                <!--end::Wrapper-->
            </div> --}}
            <!--end::Notice-->
        </div>
        <!--end::Body-->
    </div>
</div>

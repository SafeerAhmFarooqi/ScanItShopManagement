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
                    <label for="">Expense Group</label>
                    <select wire:model="selectedExpenseGroup" class="form-select form-select-sm form-select-solid w-200px" data-placeholder="Expense Group" data-hide-search="true">
                        <option value="" selected="selected">All Expense Groups</option>
                        @foreach ($expenseGroups as $expenseGroup)
                                      <option  value="{{$expenseGroup->id}}">
                                        {{$expenseGroup->name}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>
               

               
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">From Month</label>
                    <input type="date" class="form-control form-control-lg form-control-solid" wire:model="selectedFromDate">
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">To Month</label>
                    <input type="date" class="form-control form-control-lg form-control-solid" wire:model="selectedToDate">
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
@if ($expenses)
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
     
        <!--end::Heading-->
        <!--begin::Toolbar-->
        <div class="card-title">
            <h3>Report Date :  {{\Carbon\Carbon::parse($selectedFromDate)->format('F d,y')}} to {{\Carbon\Carbon::parse($selectedToDate)->format('F d,y')}}</h3>

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
                        <th class="min-w-250px">Expense Group</th>
                        <th class="min-w-250px">Head</th>
                        <th class="min-w-250px">Rate</th>
                        <th class="min-w-250px">Quantity</th>
                        <th class="min-w-250px">Amount</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-bold text-gray-600">
                  
                  @foreach ($expenses as $expense)
                  <tr>
                    <td>{{$expense->dateofexpense->format('F d,y')??''}}</td>
                    <td>{{$expense->group->name??''}}</td>
                    <td>{{$expense->head??''}}</td>
                    <td>{{$expense->rate??''}}</td>
                    <td>{{$expense->quantity??''}}</td>
                    <td>{{$expense->amount??''}}</td>
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
                              
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            <tr>
                                <td>
                                    <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Expenses</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$expenses->count()}}</span>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Amount</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-primary fs-7 fw-bolder">{{$expenses->sum('amount')}}</span>
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

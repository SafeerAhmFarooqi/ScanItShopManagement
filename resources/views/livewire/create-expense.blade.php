<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @include('common.validation')
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
           
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <form wire:submit.prevent="submit">
                <div class="card-toolbar">
                    <div class="my-1 me-4">
                        <!--begin::Select-->
                        <h5>Expense Group</h5>
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

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
                    <label for="">Employees</label>
                    <select wire:model="selectedEmployee" class="form-select form-select-sm form-select-solid w-300px" data-placeholder="Employees" data-hide-search="true">
                        <option value="" selected="selected">All Employees</option>
                        @foreach ($employees as $employee)
                                      <option value="{{$employee->id}}">
                                        {{$employee->name.' : '.$employee->email}}
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
        



        
        <!--end::Card body-->
    </div>
@if ($permissions)
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
     
        <!--end::Heading-->
        <!--begin::Toolbar-->
        <div class="card-title">
            <h3>Permissions</h3>

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
                        <th class="min-w-50px">Id</th>
                        <th class="min-w-250px">Name</th>
                        <th class="min-w-250px">Action</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-bold text-gray-600">
                  
                  @foreach ($permissions as $permission)
                  <tr>
                    <td>{{$permission->id??''}}</td>
                    <td>{{$permission->name??''}}</td>
                    <td><div class="form-check form-check-solid form-switch fv-row" wire:click="submit({{$permission->id}})">
                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" wire:model="permission.{{$permission->id}}"/>
                        <label class="form-check-label" for="allowmarketing"></label>
                    </div></td>
                   
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


    <!--end: Card Body-->
</div>
@endif

   
</div>

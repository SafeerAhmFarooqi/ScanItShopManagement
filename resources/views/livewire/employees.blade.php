<div>
    @include('common.validation')
    <div class="card card-xl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Employees</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{$employees->count()}} Employees</span>
            </h3>
            @can('Create New Employee Function')
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" >
                <div class="me-10">
                    <input wire:model="search" type="text" class="form-control form-control-sm form-control-solid" placeholder="Search" title="Type to Search"/>
                </div>
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends" title="Click to add New Expense">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->New Employee</a>
            </div>
            @endcan
           
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-100px">Serail No</th>
                            <th class="min-w-150px">Name</th>
                            <th class="min-w-150px">Email/UserName</th>
                            <th class="min-w-150px">Role</th>
                            <th class="min-w-150px">Password</th>
                            <th class="min-w-150px">Address</th>
                            <th class="min-w-150px">Phone Number</th>
                            <th class="min-w-150px">Designation</th>
                            <th class="min-w-150px">Date Created</th>
                            <th class="min-w-100px text-end">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$loop->iteration}}</a>
                                      
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->name}}</a>
                                       
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->email}}</a>
                                       
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->hasRole('Employee')?'Employee' : ''}}</a>
                                       
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->savePassword->password??''}}</a>
                                       
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->address??''}}</a>
                                       
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->phonenumber??''}}</a>
                                       
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->designation??''}}</a>
                                       
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{$employee->created_at->format('F d,y')??''}}</a>
                                       
                                    </div>
                                </div>
                            </td>
                           
                        
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                   @can('Edit Employee Function')
                                   <a href="javascript:;" wire:click="getEmployee({{$employee->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends_update">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                   @endcan
                                    @can('Delete Employee Function')
                                    <a href="javascript:;" wire:click="deleteEmployee({{$employee->id}})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends_delete">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    @endcan
                                   
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      
                      
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>













    <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <form wire:submit.prevent="submit">
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Heading-->
                        <div class="text-center mb-13">
                            <!--begin::Title-->
                            <h1 class="mb-3">Create New Employee</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                       
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Google Contacts Invite-->
                        
                        <!--end::Google Contacts Invite-->
                        <!--begin::Separator-->
                        <div class="separator d-flex flex-center mb-8">
                            <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3"></span>
                        </div>
                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Name</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="employeeName" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Name"/>
                            @error('employeeName')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee User Name/Email</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="employeeEmail" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee User Name/Email"/>
                            @error('employeeEmail')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Password</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="employeePassword" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Password"/>
                            @error('employeePassword')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Address</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="employeeAddress" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Address"/>
                            @error('employeeAddress')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Phone Number</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="employeePhoneNumber" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Phone Number"/>
                            @error('employeePhoneNumber')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Designation</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="employeeDesignation" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Designation"/>
                            @error('employeeDesignation')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        
                        <!--end::Separator-->
                        <!--begin::Textarea-->
                       
                        <!--end::Textarea-->
                        <!--begin::Users-->
                     
                        <!--end::Users-->
                        <!--begin::Notice-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="d-flex flex-center mt-15">
                                <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                                <button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Create Employee</button>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Notice-->
                    </div>
                </form>
               
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>


    <div class="modal fade" id="kt_modal_invite_friends_update" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <form wire:submit.prevent="submitEdit">
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Heading-->
                        <div class="text-center mb-13">
                            <!--begin::Title-->
                            <h1 class="mb-3">Update {{$showEmployeeName??''}}</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                       
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Google Contacts Invite-->
                        
                        <!--end::Google Contacts Invite-->
                        <!--begin::Separator-->
                        <div class="separator d-flex flex-center mb-8">
                            <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3"></span>
                        </div>
                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Name</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="editEmployeeName" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Name"/>
                            @error('editEmployeeName')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Password</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="editEmployeePassword" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Password"/>
                            @error('editEmployeePassword')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Address</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="editEmployeeAddress" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Address"/>
                            @error('editEmployeeAddress')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Phone Number</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="editEmployeePhoneNumber" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Phone Number"/>
                            @error('editEmployeePhoneNumber')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label>
                     
                            <span class="text-dark fw-bolder text-hover-primary fs-6">Employee Designation</span>
                        </label>
                        <div class="mb-5">
                            <input wire:model="editEmployeeDesignation" type="text" class="form-control form-control-sm form-control-solid" placeholder="Employee Designation"/>
                            @error('editEmployeeDesignation')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Separator-->
                        <!--begin::Textarea-->
                       
                        <!--end::Textarea-->
                        <!--begin::Users-->
                      
                        <!--end::Users-->
                        <!--begin::Notice-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="d-flex flex-center mt-15">
                                <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                                <button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Update Employee</button>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Notice-->
                    </div>
                </form>
               
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <div class="modal fade" id="kt_modal_invite_friends_delete" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <form wire:submit.prevent="submitDelete">
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Heading-->
                        <div class="text-center mb-13">
                            <!--begin::Title-->
                            <h1 class="mb-3">Delete {{$editEmployeeName??''}}</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                       
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Google Contacts Invite-->
                        
                        <!--end::Google Contacts Invite-->
                        <!--begin::Separator-->
                        <div class="separator d-flex flex-center mb-8">
                            <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3"></span>
                        </div>
                      
                        <div class="mb-5">
                            <h3>Are you sure you want to delete this employee</h3>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Textarea-->
                       
                        <!--end::Textarea-->
                        <!--begin::Users-->
                      
                        <!--end::Users-->
                        <!--begin::Notice-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="d-flex flex-center mt-15">
                                <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                                <button type="submit" id="kt_modal_users_search_submit" class="btn btn-danger">Delete Employee</button>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Notice-->
                    </div>
                </form>
               
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
</div>

@section('pageScripts')
<script> 
    window.addEventListener('hideModel', event => {
       
        $('#kt_modal_invite_friends').modal('hide');  
        $('#kt_modal_invite_friends_update').modal('hide');  
        $('#kt_modal_invite_friends_delete').modal('hide');  

})
</script> 
@endsection

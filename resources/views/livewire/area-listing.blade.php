<div>
   @include('common.validation')
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
                    <label for="">Search By Id</label>
                    <input wire:model="searchById"  type="text" class="form-control form-control-lg form-control-solid">
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">Search By Name</label>
                  <input wire:model="searchByName"  type="text" class="form-control form-control-lg form-control-solid">
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
                            <th class="min-w-250px">Area/Mall Name</th>
                            <th class="min-w-100px">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                        @if ($areas->count())
                        @foreach ($areas as $area)
                        <tr>
                            <td>{{$area->id}}</td>
                            <td> {{$area->area}} </td>
                            <td>
                                <a href="javascript:;" wire:click="$set('selectedArea', {{$area->id}})" class="btn btn-danger" type="reset"  data-bs-toggle="modal" data-bs-target="#kt_modal_delete">Delete</a>
                                <span wire:click="getArea">
                                    <a href="javascript:;" wire:click="$set('selectedArea', {{$area->id}})"  class="btn btn-primary" type="reset" data-bs-toggle="modal" data-bs-target="#kt_modal_update">Edit</a>
                                </span>
                                
                            </td>
                          
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
        
        
        
            <div class="modal fade" tabindex="-1" id="kt_modal_delete" wire:ignore.self>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">{{$modelArea->area??''}}	</h3>
            
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-1"></span>
                            </div>
                            <!--end::Close-->
                        </div>
                
                         
                        <div class="modal-body">
                            <p>Are you sure you want to delete this </p>
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <a href="javascript:;" class="btn btn-danger" wire:click="delete">Delete</a>
                        </div>
                    
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="kt_modal_update" wire:ignore.self>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title"> Edit : {{$modelArea->area??''}}	</h3>
            
                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-1"></span>
                            </div>
                            <!--end::Close-->
                        </div>
                
                         
                        <div class="modal-body">
                            <input wire:model="editArea" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text">
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <a href="javascript:;" class="btn btn-primary" wire:click="edit">Edit</a>
                        </div>
                    
                    </div>
                </div>
            </div>
        


        
        <!--end::Card body-->
    </div>

    
</div>

@section('pageScripts')
<script> 
    window.addEventListener('hideModel', event => {
       
        $('#kt_modal_delete').modal('hide');  
        $('#kt_modal_update').modal('hide');  

})
</script> 
@endsection

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class EmployeesPermissions extends Component
{
    public $selectedEmployee='';
    public $searchEmployee='';
    public $permission=[];

    public function submit($id)
    {
       // dd($this->permission[$id]);
      // dd(Permission::find($id)->name);
       
      $this->permission[$id]? $this->searchEmployee->givePermissionTo(Permission::find($id)->name)
                             : $this->searchEmployee->revokePermissionTo(Permission::find($id)->name);

    }

    public function render()
    {
        if ($this->selectedEmployee) {
            $this->searchEmployee = User::find($this->selectedEmployee);
            foreach (Permission::all() as  $permission) {
                $this->searchEmployee->hasPermissionTo($permission->name)?$this->permission[$permission->id]=true :$this->permission[$permission->id]=false ;
            }
        }
        return view('livewire.employees-permissions',[
            'employees' => User::where('email','!=','super.admin@scanit.com')->get(),
            'permissions' => $this->selectedEmployee?Permission::all() : collect(),
        ]);
    }
}

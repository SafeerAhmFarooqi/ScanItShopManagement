<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissions extends Component
{
    public $selectedRole='';
    public $searchRole='';
    public $permission=[];

    public function submit($id)
    {
       // dd($this->permission[$id]);
      // dd(Permission::find($id)->name);
       
      $this->permission[$id]? $this->searchRole->givePermissionTo(Permission::find($id)->name)
                             : $this->searchRole->revokePermissionTo(Permission::find($id)->name);

    }

    public function render()
    {
        if ($this->selectedRole) {
            $this->searchRole = Role::findByName($this->selectedRole);
            foreach (Permission::all() as  $permission) {
                $this->searchRole->hasPermissionTo($permission->name)?$this->permission[$permission->id]=true :$this->permission[$permission->id]=false ;
            }
        }
        return view('livewire.roles-permissions',[
            'roles' => Role::where('name','!=','SuperAdmin')->get(),
            'permissions' => $this->selectedRole?Permission::all() : collect(),
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\ExpanseGroup;
use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Billing;
use App\Models\RentalCustomer;
use Illuminate\Support\Carbon;

class CreateExpanseGroup extends Component
{
    public $groupName='';
    public $groupDescription='';
    public $editGroupName='';
    public $editGroupDescription='';
    public $selectedExpanseGroup='';
    public $editExpanseGroup='';
    public $search='';
 
    protected $validationAttributes = [
        'groupName' => 'Group Name',
        'groupDescription' => 'Group Description',
        'editGroupName' => 'Group Name',
        'editGroupDescription' => 'Group Description',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'groupName' => ['required', 'string'],
            'groupDescription' => ['string','nullable'],
        ];
    }

    protected function rulesEdit()
    {
        return [
            'editGroupName' => ['required', 'string'],
            'editGroupDescription' => ['string','nullable'],
        ];
    }

    public function render()
    {
        $expanseGroups=ExpanseGroup::when($this->search, function($query) {
            return $query
            ->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%');
        })
        ->get();
        return view('livewire.create-expanse-group',[
            'expanseGroups' => $expanseGroups,
        ]);
    }

    public function submit()
    {
        $this->validate();

        $expanseGroup=ExpanseGroup::create([
            'name'=>$this->groupName,
            'description'=>$this->groupDescription,
            
        ]);
        $this->dispatchBrowserEvent('hideModel');
        if($expanseGroup) {
            $this->resetForm();
            Session::flash('success', __('New Expanse Group Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create New Expense Group'));
        }
    }

    public function submitEdit()
    {
        $this->validate($this->rulesEdit());

        $result=$this->editExpanseGroup->update([
            'name'=>$this->editGroupName,
            'description'=>$this->editGroupDescription,
        ]);

        $this->dispatchBrowserEvent('hideModel');
        if($result) {
            $this->resetForm();
            Session::flash('success', __('Expanse Group Updated Successfully'));
        } else {
            Session::flash('error', __('Unable to Update Expense Group'));
        }
    }

    public function getExpanseGroup($id)
    {
        $this->selectedExpanseGroup=$id;

        $this->editExpanseGroup=ExpanseGroup::findOrFail($id);

        $this->editGroupName=$this->editExpanseGroup->name;
        $this->editGroupDescription=$this->editExpanseGroup->description;
    }

    public function resetForm()
    {
        $this->groupName='';
        $this->groupDescription='';
        $this->editGroupName='';
        $this->editGroupDescription='';
    }
}

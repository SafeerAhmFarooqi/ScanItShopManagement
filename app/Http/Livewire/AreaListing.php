<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Billing;
use App\Models\RentalCustomer;
use Illuminate\Support\Carbon;

class AreaListing extends Component
{
    public $searchById='';
    public $searchByName='';
    public $selectedArea='';
    public $editArea='';

    public function delete()
    {
        $area=Area::find($this->selectedArea)->delete();
        $this->dispatchBrowserEvent('hideModel');
        if ($area) {
            Session::flash('success', __('Area/Mall deleted Successfully'));
        } else {
            Session::flash('error', __('Unable to delete Area/Mall'));
        }
        
    }

    public function edit()
    {
        $area=Area::find($this->selectedArea);
        $area->update([
            'area'=> $this->editArea,
        ]);
        $this->dispatchBrowserEvent('hideModel');
        $this->editArea='';
        if ($area) {
            Session::flash('success', __('Area/Mall Edited Successfully'));
        } else {
            Session::flash('error', __('Unable to Edit Area/Mall'));
        }
        
    }

    public function getArea()
    {
        $area=Area::find($this->selectedArea);
        $this->editArea=$area->area;  
    }
 
    public function render()
    {
        $areas=Area::when($this->searchByName, function($query) {
                         return $query->where('area',  'like', '%'.$this->searchByName.'%');
                    })
                    ->when($this->searchById, function($query) {
                        return $query->where('id', $this->searchById);
                    })
                    ->get();
        return view('livewire.area-listing',[
            'areas' => $areas,
            'modelArea' => Area::find($this->selectedArea),
        ]);
    }
}

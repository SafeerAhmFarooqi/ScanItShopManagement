<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;

class AddNewShop extends Component
{
    public $selectedArea=0;
    public $selectedFloor='';
    public $shopNo='';
    public $shopSize='';
    public $shopRent='';
    public $shopNote='';

    protected $validationAttributes = [
        'selectedArea' => 'Area',
        'selectedFloor' => 'Floor',
        'shopNo'=>'Shop Number',
        'shopSize'=>'Shop Size',
        'shopRent'=>'Shop Rent',
        'shopNote'=>'Shop Note',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedArea' => ['required', 'string'],
            'selectedFloor' => ['required', 'string'],
            'shopNo'=>['required', 'string'],
            'shopSize'=>['required', 'string'],
            'shopRent'=>['required', 'string'],
            'shopNote'=>['string'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $shop=shop::create([
            'area_id'=>$this->selectedArea,
            'floor_id'=>$this->selectedFloor,
            'shopno'=>$this->shopNo,
            'shoprent'=>$this->shopRent,
            'shopsize'=>$this->shopSize,
            'note'=>$this->shopNote,
            'shopno'=>$this->shopNo,
        ]);

        if($shop) {
            $this->resetForm();
            Session::flash('success', __('Shop Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create Shop'));
        }
    }

    public function render()
    {
        $floors=Floor::where('area_id',$this->selectedArea)->get();
        return view('livewire.add-new-shop',[
            'floors' => $floors,
            'areas' => Area::all(),
        ]);
    }

    public function resetForm()
    {
        $this->selectedArea='';
        $this->selectedFloor='';
        $this->shopNo='';
        $this->shopRent='';
        $this->shopSize='';
        $this->shopNote='';
        $this->shopNo='';
    }
}

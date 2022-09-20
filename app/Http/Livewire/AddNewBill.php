<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;
use App\Models\RentalCustomer;
use App\Models\Billing;
use Illuminate\Support\Carbon;

class AddNewBill extends Component
{
    public $selectedArea=0;
    public $selectedFloor='';
    public $selectedShop='';
    public $selectedCustomer='';
    public $selectedStartingMonth='';
    public $selectedEndingMonth='';
    public $noOfMonths='';
    public $rentAmount='';
    public $collectedRent='';
    public $note='';


    protected $validationAttributes = [
        'selectedArea' => 'Area',
        'selectedFloor' => 'Floor',
        'selectedShop' => 'Shop Number',
        'rentAmount'=>'Rent Amount',
        'note' => 'Note for Rent Amount',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedArea' => ['required', 'string'],
            'selectedFloor' => ['required', 'string'],
            'selectedShop' => ['required', 'string'],
            'note' => ['string','nullable'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $billing=Billing::create([
            'area_id'=>$this->selectedArea,
            'floor_id'=>$this->selectedFloor,
            'shop_id'=>$this->selectedShop,
            'customer_id'=>$this->selectedCustomer->id,
            'rentamount'=>$this->collectedRent,
            'noofmonths'=>$this->noOfMonths,
            'note'=>$this->note,
        ]);

        if($billing) {
            $this->resetForm();
            Session::flash('success', __('New Bill Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create New Bill'));
        }
    }

    // public function dehydrate()
    // {
    //    // $this->dispatchBrowserEvent('getLocation');
    //     $this->dispatchBrowserEvent('getCalendar',['months'=>$this->selectedMonths] );
    // }

    public function getMonths()
    {
        $this->dispatchBrowserEvent('getCalendar',['months'=>$this->selectedMonths] );
    }

    public function render()
    {
        $floors=Floor::where('area_id',$this->selectedArea)->get();
        $shops=Shop::where('floor_id',$this->selectedFloor)->get();
        $this->selectedCustomer=RentalCustomer::where('shop_id',$this->selectedShop)->first();
        $this->noOfMonths=$this->selectedStartingMonth&&$this->selectedEndingMonth&&$this->selectedEndingMonth>=$this->selectedStartingMonth
                          ?Carbon::parse($this->selectedStartingMonth)->diffInMonths(Carbon::parse($this->selectedEndingMonth))+1 
                          : 0;
        return view('livewire.add-new-bill',[
            'floors' => $floors,
            'shops' => $shops,
            'rentalCustomer' => $this->selectedCustomer,
            'areas' => Area::all(),
        ]);
    }

    public function resetForm()
    {
        $this->selectedArea='';
        $this->selectedFloor='';
        $this->selectedShop='';
        $this->selectedCustomer='';
        $this->rentAmount='';
        $this->note='';
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;
use App\Models\RentalCustomer;

class AddNewRentalCustomer extends Component
{
    public $selectedArea=0;
    public $selectedFloor='';
    public $selectedShop='';
    public $customerName='';
    public $customerPhoneNumber='';
    public $advancePayment='';
    public $cutOffPayment='';
    public $note='';

    protected $validationAttributes = [
        'selectedArea' => 'Area',
        'selectedFloor' => 'Floor',
        'selectedShop' => 'Shop Number',
        'customerName'=>'Customer Name',
        'customerPhoneNumber'=>'Customer Phone Number',
        'advancePayment'=>'Advance Payment',
        'cutOffPayment'=>'Cut Off Payment',
        'note' => 'Note for Customer',
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
            'customerName'=>['required', 'string'],
            'customerPhoneNumber'=>['required', 'string'],
            'advancePayment'=>['required', 'numeric'],
            'cutOffPayment'=>['required', 'numeric'],
            'note' => ['string','nullable'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $rentalCustomer=RentalCustomer::create([
            'area_id'=>$this->selectedArea,
            'floor_id'=>$this->selectedFloor,
            'shop_id'=>$this->selectedShop,
            'name'=>$this->customerName,
            'phonenumber'=>$this->customerPhoneNumber,
            'advancepayment'=>$this->advancePayment,
            'cutoffpayment'=>$this->cutOffPayment,
            'note'=>$this->note,
        ]);

        if($rentalCustomer) {
            $this->resetForm();
            Session::flash('success', __('Rental Customer Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create Rental Customer'));
        }
    }
    public function render()
    {
        $floors=Floor::where('area_id',$this->selectedArea)->get();
        $shops=Shop::where('floor_id',$this->selectedFloor)->get();
        return view('livewire.add-new-rental-customer',[
            'floors' => $floors,
            'shops' => $shops,
            'areas' => Area::all(),
        ]);
    }

    public function resetForm()
    {
        $this->selectedArea='';
        $this->selectedFloor='';
        $this->selectedShop='';
        $this->customerName='';
        $this->customerPhoneNumber='';
        $this->advancePayment='';
        $this->cutOffPayment='';
        $this->note='';
    }
}

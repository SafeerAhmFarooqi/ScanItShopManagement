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

class CustomerMonthlyReport extends Component
{
    public $selectedArea='';
    public $selectedFloor='';
    public $selectedShop='';
    public $selectedFromMonth='';
    public $selectedToMonth='';
    public $generateReport=false;
    public $rentalCustomer='';
    public $bills='';

    public function render()
    {
        if ($this->generateReport&&$this->selectedArea&&$this->selectedFloor&&$this->selectedShop) {
            $this->rentalCustomer=RentalCustomer::where('shop_id',$this->selectedShop)->first();
            $this->bills=Billing::
            where('customer_id',$this->rentalCustomer->id)
            ->when($this->selectedFromMonth&&$this->selectedToMonth,function($query){
                return $query->whereBetween('created_at',[Carbon::parse($this->selectedFromMonth),Carbon::parse($this->selectedToMonth)->addMonth(1)]);
            })
            ->get();
            
            $this->generateReport=false;
        }
        $floors=Floor::where('area_id',$this->selectedArea)->get();
        $shops=Shop::where('floor_id',$this->selectedFloor)->get();
        $this->generateReport=false;
        return view('livewire.customer-monthly-report',[
            'floors' => $floors,
            'shops' => $shops,
            'areas' => Area::all(),
        ]);
    }
}

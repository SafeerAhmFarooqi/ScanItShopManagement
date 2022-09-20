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

class SalesReport extends Component
{
    public $selectedArea='';
    public $selectedFloor='';
    public $selectedShop='';
    public $customerName='';
    public $customerPhoneNumber='';
    public $advancePayment='';
    public $cutOffPayment='';
    public $note='';

    public function getDueAmount($id)
    {
        $rentalCustomer=RentalCustomer::findOrFail($id);
        $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
        $totalMonths=$rentalCustomer->created_at->diffInMonths(Carbon::now());
        $totalDueRent=$totalMonths*$rentalCustomer->shop->shoprent;
        $cutOffPayment=0;
        if ($rentalCustomer->cutoffpayment&&$rentalCustomer->advancepayment&&$rentalCustomer->cutoffpayment<=$rentalCustomer->advancepayment) {
            $cutOffAmount=$rentalCustomer->cutoffpayment;
            $remainingAdvance=$rentalCustomer->advancepayment;
            for ($i=0; $i < $totalMonths ; $i++) {
                $remainingAdvance=$remainingAdvance-$cutOffAmount;
                if($remainingAdvance<$rentalCustomer->cutoffpayment)
                {
                    $cutOffAmount=$remainingAdvance;
                }
                if ($remainingAdvance<=0) {
                    break;
                } 
            }
            $cutOffPayment=$rentalCustomer->advancepayment-$remainingAdvance;
        }
        $totalDueRent-=$cutOffPayment;
        $totalRentPaid=Billing::where('customer_id',$id)->sum('rentamount');
        $totalDueRent-=$totalRentPaid;
        return $totalDueRent;
    }

    public function getTotalPaymentsAmount($id)
    {
        $rentalCustomer=RentalCustomer::findOrFail($id);
        $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
        $totalMonths=$rentalCustomer->created_at->diffInMonths(Carbon::now());
        $totalDueRent=$totalMonths*$rentalCustomer->shop->shoprent;
        $cutOffPayment=0;
        if ($rentalCustomer->cutoffpayment&&$rentalCustomer->advancepayment&&$rentalCustomer->cutoffpayment<=$rentalCustomer->advancepayment) {
            $cutOffAmount=$rentalCustomer->cutoffpayment;
            $remainingAdvance=$rentalCustomer->advancepayment;
            for ($i=0; $i < $totalMonths ; $i++) {
                $remainingAdvance=$remainingAdvance-$cutOffAmount;
                if($remainingAdvance<$rentalCustomer->cutoffpayment)
                {
                    $cutOffAmount=$remainingAdvance;
                }
                if ($remainingAdvance<=0) {
                    break;
                } 
            }
            $cutOffPayment=$rentalCustomer->advancepayment-$remainingAdvance;
        }
        $totalDueRent-=$cutOffPayment;
        $totalRentPaid=Billing::where('customer_id',$id)->sum('rentamount');
        
        return ($cutOffPayment+$totalRentPaid);
    }

   

    public function getLeftAdvancePayment($id)
    {
        $rentalCustomer=RentalCustomer::findOrFail($id);
        $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
        $totalMonths=$rentalCustomer->created_at->diffInMonths(Carbon::now());
        $totalDueRent=$totalMonths*$rentalCustomer->shop->shoprent;
        $cutOffPayment=0;
        if ($rentalCustomer->cutoffpayment&&$rentalCustomer->advancepayment&&$rentalCustomer->cutoffpayment<=$rentalCustomer->advancepayment) {
            $cutOffAmount=$rentalCustomer->cutoffpayment;
            $remainingAdvance=$rentalCustomer->advancepayment;
            for ($i=0; $i < $totalMonths ; $i++) {
                $remainingAdvance=$remainingAdvance-$cutOffAmount;
                if($remainingAdvance<$rentalCustomer->cutoffpayment)
                {
                    $cutOffAmount=$remainingAdvance;
                }
                if ($remainingAdvance<=0) {
                    break;
                } 
            }
            return $remainingAdvance;
        }else{
            return $rentalCustomer->advancepayment;
        }
    }

    public function render()
    {
        $floors=Floor::where('area_id',$this->selectedArea)->get();
        $shops=Shop::where('floor_id',$this->selectedFloor)->get();
        $rentalCustomers=RentalCustomer::when($this->selectedArea, function($query) {
            return $query->where('area_id', $this->selectedArea);
        })
            ->when($this->selectedFloor, function($query) {
                return $query->where('floor_id', $this->selectedFloor);
            })
            ->when($this->selectedShop, function($query) {
                return $query->where('shop_id', $this->selectedShop);
            })->get();
        return view('livewire.sales-report',[
            'floors' => $floors,
            'shops' => $shops,
            'rentalCustomers' => $rentalCustomers,
            'areas' => Area::all(),
        ]);
    }
}

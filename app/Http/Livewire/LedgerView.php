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

class LedgerView extends Component
{
    public $selectedArea='';
    public $selectedFloor='';
    public $selectedShop='';
    public $selectedFromDate='';
    public $selectedToDate='';
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

    public function getTotalPaidTillToday($id)
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

    public function getPaymentMonthStatus($id)
    {
        $rentalCustomer=RentalCustomer::findOrFail($id);
       // $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
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
        //dd($cutOffPayment);
        //dd($totalDueRent);
        $totalDueRent-=$cutOffPayment;
        //dd($totalDueRent);
        $totalRentPaid=Billing::where('customer_id',$id)->sum('rentamount');
        $totalDueRent-=$totalRentPaid;
        //dd($totalDueRent);
        if ($totalDueRent>$totalRentPaid) {
            $totalDueRentCheck=$totalDueRent;
            //dd('rent is due');
            $pendingNumberOfMOnths=1;
            for ($i=0; $i < $totalMonths; $i++) {
                 
                $totalDueRentCheck-=$rentalCustomer->shop->shoprent;
                //dd($totalDueRentCheck);
                if ($totalDueRentCheck>0) {
                    $pendingNumberOfMOnths++;    
                } else {
                    break;
                }             
            }
            $pendingMonthsNames='';
            //dd($pendingNumberOfMOnths);
            for ($i=0; $i < $pendingNumberOfMOnths; $i++) { 
                $pendingMonthsNames=$pendingMonthsNames.Carbon::now()->subMonths($i)->format('F,');
            }
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=true;
            $result->totalMonths=$pendingNumberOfMOnths;
            $result->message='Pending For '.$pendingMonthsNames;
            return $result;
        } else {
            //dd('rent is not due');
            //dd(0);
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=false;
            $result->totalMonths=$totalMonths;
            $result->message='Completed Till '.$rentalCustomer->created_at->addDays($totalMonths)->format('F d,y');
            return $result;
        }

    }

    

    public function getRentCollectionDate($id,$date=null)
    {
        $rentalCustomer=RentalCustomer::findOrFail($id);
       // $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
        $totalMonths=$rentalCustomer->created_at->diffInMonths(Carbon::now());
        if ($date) {
            if (Carbon::parse($date)) {
                # code...
            } else {
                # code...
            }
            
        }
        return $rentCollectionDate=$rentalCustomer->created_at->addMonths($totalMonths)->format('F d,y');
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
        //dd($cutOffPayment);
        //dd($totalDueRent);
        $totalDueRent-=$cutOffPayment;
        //dd($totalDueRent);
        $totalRentPaid=Billing::where('customer_id',$id)->sum('rentamount');
        $totalDueRent-=$totalRentPaid;
        //dd($totalDueRent);
        if ($totalDueRent>$totalRentPaid) {
            $totalDueRentCheck=$totalDueRent;
            //dd('rent is due');
            $pendingNumberOfMOnths=1;
            for ($i=0; $i < $totalMonths; $i++) {
                 
                $totalDueRentCheck-=$rentalCustomer->shop->shoprent;
                //dd($totalDueRentCheck);
                if ($totalDueRentCheck>0) {
                    $pendingNumberOfMOnths++;    
                } else {
                    break;
                }             
            }
            $pendingMonthsNames='';
            //dd($pendingNumberOfMOnths);
            for ($i=0; $i < $pendingNumberOfMOnths; $i++) { 
                $pendingMonthsNames=$pendingMonthsNames.Carbon::now()->subMonths($i)->format('F,');
            }
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=true;
            $result->totalMonths=$pendingNumberOfMOnths;
            $result->message='Pending For '.$pendingMonthsNames;
            return $result;
        } else {
            //dd('rent is not due');
            //dd(0);
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=false;
            $result->totalMonths=$totalMonths;
            $result->message='Completed Till '.$rentalCustomer->created_at->addDays($totalMonths)->format('F d,y');
            return $result;
        }
        

    }

    public function getSelectedDatesPaidAmount($id,$fromDate,$toDate)
    {
        $rentalCustomer=RentalCustomer::findOrFail($id);
       // $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
       $loopFromDate=Carbon::parse($fromDate);
       $loopToDate=Carbon::parse($toDate);
       for ($i=0; $loopFromDate >= $loopToDate ; $i++) { 
               if (Carbon::parse($this->getRentCollectionDate($id))>=Carbon::parse($fromDate)&&Carbon::parse($this->getRentCollectionDate($id))<=Carbon::parse($toDate)) {
                # code...
               }
       }

       
        $totalMonths=$rentalCustomer->created_at->diffInMonths(Carbon::now());
        return $rentCollectionDate=$rentalCustomer->created_at->addMonths($totalMonths)->format('F d,y');
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
        //dd($cutOffPayment);
        //dd($totalDueRent);
        $totalDueRent-=$cutOffPayment;
        //dd($totalDueRent);
        $totalRentPaid=Billing::where('customer_id',$id)->sum('rentamount');
        $totalDueRent-=$totalRentPaid;
        //dd($totalDueRent);
        if ($totalDueRent>$totalRentPaid) {
            $totalDueRentCheck=$totalDueRent;
            //dd('rent is due');
            $pendingNumberOfMOnths=1;
            for ($i=0; $i < $totalMonths; $i++) {
                 
                $totalDueRentCheck-=$rentalCustomer->shop->shoprent;
                //dd($totalDueRentCheck);
                if ($totalDueRentCheck>0) {
                    $pendingNumberOfMOnths++;    
                } else {
                    break;
                }             
            }
            $pendingMonthsNames='';
            //dd($pendingNumberOfMOnths);
            for ($i=0; $i < $pendingNumberOfMOnths; $i++) { 
                $pendingMonthsNames=$pendingMonthsNames.Carbon::now()->subMonths($i)->format('F,');
            }
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=true;
            $result->totalMonths=$pendingNumberOfMOnths;
            $result->message='Pending For '.$pendingMonthsNames;
            return $result;
        } else {
            //dd('rent is not due');
            //dd(0);
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=false;
            $result->totalMonths=$totalMonths;
            $result->message='Completed Till '.$rentalCustomer->created_at->addDays($totalMonths)->format('F d,y');
            return $result;
        }
        

    }

    public function getTotalBillsPaid($id,$fromDate,$toDate)
    {
        if ($this->selectedFromDate&&$this->selectedToDate) {
            $bills=Billing::
        where('customer_id',$id)
        ->whereBetween('created_at',[Carbon::parse($fromDate),Carbon::parse($toDate)])->get();
       return $bills->sum('rentamount');
        } else {
            $bills=Billing::
        where('customer_id',$id)->get();
       return $bills->sum('rentamount');
        }
        
        
        // $from = Carbon::createFromFormat('Y-m-d H:s:i', '2023-1-1 9:30:34');
       $loopFromDate=Carbon::parse($fromDate);
       $loopToDate=Carbon::parse($toDate);
       for ($i=0; $loopFromDate >= $loopToDate ; $i++) { 
               if (Carbon::parse($this->getRentCollectionDate($id))>=Carbon::parse($fromDate)&&Carbon::parse($this->getRentCollectionDate($id))<=Carbon::parse($toDate)) {
                # code...
               }
       }

       
        $totalMonths=$rentalCustomer->created_at->diffInMonths(Carbon::now());
        return $rentCollectionDate=$rentalCustomer->created_at->addMonths($totalMonths)->format('F d,y');
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
        //dd($cutOffPayment);
        //dd($totalDueRent);
        $totalDueRent-=$cutOffPayment;
        //dd($totalDueRent);
        $totalRentPaid=Billing::where('customer_id',$id)->sum('rentamount');
        $totalDueRent-=$totalRentPaid;
        //dd($totalDueRent);
        if ($totalDueRent>$totalRentPaid) {
            $totalDueRentCheck=$totalDueRent;
            //dd('rent is due');
            $pendingNumberOfMOnths=1;
            for ($i=0; $i < $totalMonths; $i++) {
                 
                $totalDueRentCheck-=$rentalCustomer->shop->shoprent;
                //dd($totalDueRentCheck);
                if ($totalDueRentCheck>0) {
                    $pendingNumberOfMOnths++;    
                } else {
                    break;
                }             
            }
            $pendingMonthsNames='';
            //dd($pendingNumberOfMOnths);
            for ($i=0; $i < $pendingNumberOfMOnths; $i++) { 
                $pendingMonthsNames=$pendingMonthsNames.Carbon::now()->subMonths($i)->format('F,');
            }
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=true;
            $result->totalMonths=$pendingNumberOfMOnths;
            $result->message='Pending For '.$pendingMonthsNames;
            return $result;
        } else {
            //dd('rent is not due');
            //dd(0);
            $result=collect(['pending', 'totalMonths','message']);
            $result->pending=false;
            $result->totalMonths=$totalMonths;
            $result->message='Completed Till '.$rentalCustomer->created_at->addDays($totalMonths)->format('F d,y');
            return $result;
        }
        

    }
    public function render()
    {
        $rentalCustomers2=collect();
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
            })
            // ->when($this->selectedFromDate&&$this->selectedToDate, function($query) {
            //     dd($query->first()->id);
            //     foreach ($query as $key => $value) {
            //         dd($this->getRentCollectionDate($value->id));
            //     }
            //     // dd($query->first());
            //     // $totalMonths=$this->created_at->diffInMonths(Carbon::now());
            //     // $rentCollectionDate=$rentalCustomer->created_at->addMonths($totalMonths);
            //     // dd($query->pluck('id'));
            //     // return $query->whereBetween($this->getRentCollectionDate(), [$this->selectedFromDate,$this->selectedToDate]);
            // })
            ->get();
            if($this->selectedFromDate&&$this->selectedToDate)
            {
                //dd('check');
                foreach ($rentalCustomers as $key => $value) {
                    $collectionDate=Carbon::parse($this->getRentCollectionDate($value->id));
                    //dd($collectionDate);
                    if ($collectionDate>=Carbon::parse($this->selectedFromDate)&&$collectionDate<=Carbon::parse($this->selectedToDate)) {
                        $rentalCustomers2->push($value);
                        //dd('check');
                    }
                }
                //dd($rentalCustomers2);
            }
            $mallRentsCollected=0;
            if ($rentalCustomers2->count()>0) {
                foreach ($rentalCustomers2 as $key => $value) {
                    $mallRentsCollected+=$this->getTotalBillsPaid($value->id,$this->selectedFromDate,$this->selectedToDate);
                }
            } else {
                foreach ($rentalCustomers as $key => $value) {
                    $mallRentsCollected+=$this->getTotalBillsPaid($value->id,$this->selectedFromDate,$this->selectedToDate);
                }
            }
            
            
        return view('livewire.ledger-view',[
            'floors' => $floors,
            'shops' => $shops,
            'rentalCustomers' => $rentalCustomers2->count()>0?$rentalCustomers2 : $rentalCustomers,
            'mallRentsCollected' => $mallRentsCollected,
            'areas' => Area::all(),
        ]);
    }
}

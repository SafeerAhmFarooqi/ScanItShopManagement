<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Billing;
use App\Models\RentalCustomer;
use App\Models\ExpanseGroup;
use App\Models\Expense;
use Illuminate\Support\Carbon;

class ExpenseReport extends Component
{
    public $selectedExpenseGroup='';
    public $selectedFromDate='';
    public $selectedToDate='';
    public $generateReport=false;

    public function render()
    {
        $expenses=NULL;
        if ($this->generateReport&&$this->selectedFromDate&&$this->selectedToDate) {
            $expenses=Expense::
            when($this->selectedFromDate&&$this->selectedToDate,function($query){
                return $query->whereBetween('dateofexpense',[Carbon::parse($this->selectedFromDate),Carbon::parse($this->selectedToDate)]);
            })
            ->when($this->selectedExpenseGroup,function($query){
                return $query->where('expensegroup_id',$this->selectedExpenseGroup);
            })
            ->orderBy('dateofexpense','DESC')->get();
            
            $this->generateReport=false;
        }
        $this->generateReport=false;
        return view('livewire.expense-report',[
            'expenseGroups' => ExpanseGroup::all(),
            'expenses' => $expenses,
        ]);
    }
}

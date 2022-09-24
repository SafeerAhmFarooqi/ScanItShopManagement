<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\ExpanseGroup;
use App\Models\Expense;
use App\Models\Floor;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Billing;
use App\Models\RentalCustomer;
use Illuminate\Support\Carbon;

class CreateExpense extends Component
{
    public $expenseGroup='';
    public $date='';
    public $head='';
    public $rate=0;
    public $quantity=0;
    public $amount=0;

    protected $validationAttributes = [
        'expenseGroup' => 'Expense Group',
        'date' => 'Date',
        'head' => 'Head',
        'rate' => 'Rate',
        'quantity' => 'Quantity',
        'amount' => 'Amount',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'expenseGroup' => ['required'],
            'date' => ['required','date'],
            'head' => ['required', 'string'],
            'rate' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $expense=Expense::create([
            'expensegroup_id'=>$this->expenseGroup,
            'head'=>$this->head,
            'rate'=>$this->rate,
            'quantity'=>$this->quantity,
            'amount'=>$this->amount,
            'dateofexpense'=>$this->date,
        ]);

        if($expense) {
            $this->resetForm();
            Session::flash('success', __('Expense Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create Expense'));
        }
    }

    public function render()
    {
        $this->amount=(float)$this->rate*(float)$this->quantity;
        return view('livewire.create-expense',[
            'expenseGroups' => ExpanseGroup::all(),
        ]);
    }

    public function resetForm()
    {
        $this->expenseGroup='';
        $this->head='';
        $this->rate=0;
        $this->quantity=0;
        $this->amount=0;
        $this->date='';
    }
}

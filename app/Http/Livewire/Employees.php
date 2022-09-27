<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\ExpanseGroup;
use App\Models\User;
use App\Models\Passwords;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Billing;
use App\Models\RentalCustomer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class Employees extends Component
{
    public $employeeName='';
    public $employeeEmail='';
    public $employeeAddress='';
    public $employeePhoneNumber='';
    public $employeeDesignation='';
    public $employeePassword='';
    public $selectedEmployee='';
    public $showEmployeeName='';
    public $editEmployeeName='';
    public $editEmployeeEmail='';
    public $editEmployeeAddress='';
    public $editEmployeePhoneNumber='';
    public $editEmployeeDesignation='';
    public $editEmployeePassword='';
    public $editEmployee='';
    public $search='';
    
    protected $validationAttributes = [
        'employeeName' => 'Employee Name',
        'employeeEmail' => 'Employee User Name/Email',
        'employeeAddress' => 'Employee Address',
        'employeePhoneNumber' => 'Employee Phone NUmber',
        'employeeDesignation' => 'Employee Designation',
        'employeePassword' => 'Employee Password',
        'editEmployeeName' => 'Employee Name',
        'editEmployeeEmail' => 'Employee User Name/Email',
        'editEmployeeAddress' => 'Employee Address',
        'editEmployeePhoneNumber' => 'Employee Phone NUmber',
        'editEmployeeDesignation' => 'Employee Designation',
        'editEmployeePassword' => 'Employee Password',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'employeeName' => ['required', 'string'],
            'employeeEmail' => ['required', 'string', 'unique:users,email' , 'max:255'],
            'employeeAddress' => ['required', 'string'],
            'employeePhoneNumber' => ['required', 'string'],
            'employeeDesignation' => ['required', 'string'],
            'employeePassword' => ['required', Rules\Password::defaults()], 
        ];
    }

    protected function rulesEdit()
    {
        return [
        'editEmployeeName' => ['required', 'string'],
        'editEmployeeAddress' => ['required', 'string'],
        'editEmployeePhoneNumber' => ['required', 'string'],
        'editEmployeeDesignation' => ['required', 'string'],
        'editEmployeePassword' => ['required', Rules\Password::defaults()],
        ];
    }

    public function render()
    {
        $employees=User::role('Employee')
        ->when($this->search, function($query) {
            return $query
            ->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%');
        })
        ->get();
        return view('livewire.employees',[
            'employees' => $employees, 
        ]);
    }

    public function submit()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->employeeName,
            'email' => $this->employeeEmail,
            'password' => Hash::make($this->employeePassword),
            'address' => $this->employeeAddress,
            'phonenumber' => $this->employeePhoneNumber,
            'designation' => $this->employeeDesignation,
            'email_verified_at' => now(),
        ]);

        Passwords::create([
            'user_id' => $user->id,
            'password' => $this->employeePassword,
        ]);

        $user->assignRole('Employee');

        $this->dispatchBrowserEvent('hideModel');
        if($user) {
            $this->resetForm();
            Session::flash('success', __('New User Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create New User'));
        }
    }

    public function submitEdit()
    {
        $this->validate($this->rulesEdit());

        $result=$this->editEmployee->update([
            'name' => $this->editEmployeeName,
            'password' => Hash::make($this->editEmployeePassword),
            'address' => $this->editEmployeeAddress,
            'phonenumber' => $this->editEmployeePhoneNumber,
            'designation' => $this->editEmployeeDesignation,
        ]);

        $this->editEmployee->savePassword->update([
            'password' => $this->editEmployeePassword,
        ]);

        $this->dispatchBrowserEvent('hideModel');
        if($result) {
            $this->resetForm();
            Session::flash('success', __('Employee Updated Successfully'));
        } else {
            Session::flash('error', __('Unable to Update Employee'));
        }
    }

    public function getEmployee($id)
    {
        $this->selectedEmployee=$id;

        $this->editEmployee=User::find($id);
        $this->showEmployeeName=$this->editEmployee->name.' : '.$this->editEmployee->email;
        $this->editEmployeeName=$this->editEmployee->name;
        $this->editEmployeeEmail=$this->editEmployee->email;
        $this->editEmployeeAddress=$this->editEmployee->address;
        $this->editEmployeePhoneNumber=$this->editEmployee->phonenumber;
        $this->editEmployeeDesignation=$this->editEmployee->designation;
        $this->editEmployeePassword=$this->editEmployee->savePassword->password;
    }

    public function deleteEmployee($id)
    {
        $this->selectedEmployee=$id;

        $employee=User::find($id);

        $this->editEmployeeName=$employee->name.' : '.$employee->email;
    }

    public function submitDelete()
    {

        $result=User::find($this->selectedEmployee)->delete();
        $this->dispatchBrowserEvent('hideModel');
        if($result) {
            $this->resetForm();
            Session::flash('error', __('Employee Deleted Successfully'));
        } else {
            Session::flash('error', __('Unable to Delete Employee'));
        }
    }

    public function resetForm()
    {
        $this->employeeName='';
        $this->employeeEmail='';
        $this->employeeAddress='';
        $this->employeePhoneNumber='';
        $this->employeeDesignation='';
        $this->employeePassword='';
        $this->selectedEmployee='';
        $this->editEmployeeName='';
        $this->showEmployeeName='';
        $this->editEmployee='';
        $this->showEmployeeName='';
        $this->editEmployeeName='';
        $this->editEmployeeEmail='';
        $this->editEmployeeAddress='';
        $this->editEmployeePhoneNumber='';
        $this->editEmployeeDesignation='';
        $this->editEmployeePassword='';
    }
}

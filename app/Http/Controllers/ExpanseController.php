<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpanseGroup;
use Illuminate\Support\Carbon;

class ExpanseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        foreach ($request->kt_docs_repeater_basic as $key => $value) {
            if ($value['expensegroup']&&$value['date']) {
                Expense::create([
                    'expensegroup_id' => $value['expensegroup'],
                    'head' =>  $value['expensehead']??'',
                    'dateofexpense' => Carbon::parse($value['date']),
                    'rate' => $value['rate']??0,
                    'quantity' => $value['quantity']??0,
                    'amount' => ($value['rate']??0)*($value['quantity']??0),
                ]);
            } else {
                
            }
            
            
        }
        return back()->with('success', 'Expenses Created Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case "1":
              return view('expense-create-group-page');
              break;
            case "2":
                return view('expense-create-page',[
                    'expenseGroups' => ExpanseGroup::all(),
                ]);
                break;
            case "3":

                    return view('expense-list-page',[
                        'expenses' => Expense::all(),
                    ]);
                    break;
                    case "4":

                        return view('expense-report-page');
                        break;
            default:
              return back();
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

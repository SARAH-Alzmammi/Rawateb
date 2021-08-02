<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::where('user_id',\Auth::user()->id)->get();

        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $original = $request->input('original');
        $basic = (65/100)* $original;
        $residencyAllowance= (25/100)* $original;
        $transportationAllowance= (10/100)* $original;
        $insurance= (10/100)* ( $basic+$residencyAllowance);
        $actual= ($original - $insurance);

        $employee=Employees::create([
        'name'=>$request->input('name'),
        'insurance'=>$insurance,
        'basic'=>$basic,
        'transportationAllowance'=>$transportationAllowance,
        'residencyAllowance'=>$residencyAllowance,
        'original'=>$original,
        'actual'=>$actual,
        'hours'=>$request->input('hours'),
        'user_id'=>\Auth::user()->id

        ]);
        return redirect(route('employess.index' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);
      
        return view('employees.edit',compact('employee'));
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
        $employee = Employees::find($id);
        if(\Auth::id() !=  $employee->user_id){
            return abort(401);
        }
        
        $original = $request->input('original');
        $basic = (65/100)* $original;
        $residencyAllowance= (25/100)* $original;
        $transportationAllowance= (10/100)* $original;
        $insurance= (10/100)* ( $basic+$residencyAllowance);
        $actual= ($original - $insurance);

        Employees::where('id', $id)
            ->update([       
            'name'=>$request->input('name'),
            'insurance'=>$insurance,
            'basic'=>$basic,
            'transportationAllowance'=>$transportationAllowance,
            'residencyAllowance'=>$residencyAllowance,
            'original'=>$original,
            'actual'=>$actual,
            'hours'=>$request->input('hours'),
            'user_id'=>\Auth::user()->id
    ]);
        return  redirect(route('employess.index' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::where('id', $id)->delete();
        return redirect(route('employess.index' ));
  
    }
}

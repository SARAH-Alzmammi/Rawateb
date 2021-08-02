<?php

namespace App\Http\Controllers;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Monthly;
class MonthlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $records = Monthly::where('user_id',\Auth::user()->id)->get()->toArray(); 

        $monthly=[];

        foreach($records as $record){

            $date= $record['created_at'];

            if (array_key_exists($date, $monthly)) {
               array_push( $monthly[$date], $record);
            }else{
                 $monthly[$date][0]=$record;
            }

        }
        return view('monthly.index',compact('monthly'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employees::where('user_id',\Auth::user()->id)->get();
        return view('monthly.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year_date = date('Y');
        $month_date = date('m');

        $month_exiat = Monthly::where('user_id',\Auth::user()->id)
                    ->whereMonth('created_at', '=', $month_date)
                    ->whereYear('created_at', '=', $year_date)
                    ->first();

       
        if(empty($month_exiat)){
            foreach($request->get('monthly') as $key=> $month){
                Monthly::create([
                    'employees_name'=>$month['employees_name'],
                    'discount'=>$month['discount'],
                    'overtime'=>$month['overtime'],
                    'user_id'=>\Auth::user()->id,
                    'employees_id'=>$key
                    
                    ]);
            }

        }else{

            return redirect(route('monthly.index' ))->withErrors(['monthExsist'=>__('The month is already exist , please delete it and try again')]);;

        }
        return redirect(route('monthly.index' ));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $date)
    {
        $year_date = date('Y', strtotime($date));
        $month_date = date('m', strtotime($date));
        $month = Monthly::where('user_id',\Auth::user()->id)
                    ->whereMonth('created_at', '=', $month_date)
                    ->whereYear('created_at', '=', $year_date)
                    ->get();

        return view('monthly.show',compact('month'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($date)
    {
        $year_date = date('Y', strtotime($date));
        $month_date = date('m', strtotime($date));
        $month = Monthly::where('user_id',\Auth::user()->id)
                    ->whereMonth('created_at', '=', $month_date)
                    ->whereYear('created_at', '=', $year_date)
                    ->delete();
                    return redirect(route('monthly.index' ));
    }
}

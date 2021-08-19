<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Monthly;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

 
    public function table($date){

        $table=[];
        $year_date = date('Y', strtotime($date));
        $month_date = date('m', strtotime($date));

        $month = Monthly::where('user_id',\Auth::user()->id)
                    ->whereMonth('created_at', '=', $month_date)
                    ->whereYear('created_at', '=', $year_date)
                    ->get()->toArray();
    
        foreach($month as $record){
            $employees_id =$record['employees_id'];

            $employee=Employees::where('id', $employees_id)->withTrashed()->get()->toArray();
            $value =array_merge($employee,$record);
            $table += array($employees_id => $value);
        }

        $number_of_days = date("t");

        return view('table',compact('table','number_of_days'));
    }
 
}

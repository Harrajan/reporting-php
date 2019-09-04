<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class unsubscriptions_controller extends Controller
{
  function index()
  {
   $data = DB::table('unsubscriptions')->orderBy('penter_date', 'DESC')->get();
   return view('unsubscriptions', compact('data'));
  }

  function import(Request $request)
  {
   $this->validate($request, [
    'select_file'  => 'required|mimes:xls,xlsx'
   ]);

   $path = $request->file('select_file')->getRealPath();

   $data = Excel::load($path)->get();

   if($data->count() > 0)
   {
    foreach($data->toArray() as $key => $value)
    {
     foreach($value as $row)
     {
      $insert_data[] = array(
       'pseudonym'  => $row['Pseudonym'],
       'pstatus'   => $row['Panel_Status'],
       'pcredit_points' => $row['Panel_Credit_Points'],
       'penter_date' => $row['Panel_Enterance_Date'],
       'reg_code' => $row['Where_advertised_from'],
       'm_age' => $row['Age'],
       'm_gender_expanded' => $row['Gender'],
       'ats' => $row['absolute_time_stamp'],
       'datetime' => $row['Date'],
       'rts2082' => $row['relative_time_stamp2082'],
       'rts2084' => $row['relative_time_stamp2084'],

      );
     }
    }

    if(!empty($insert_data))
    {
     DB::table('recruits')->insert($insert_data);
    }
   }
   return back()->with('success', 'Excel Data Imported successfully.');
  }
}

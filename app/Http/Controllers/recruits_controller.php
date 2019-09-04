<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class recruits_controller extends Controller
{
      function index()
      {
       $data = DB::table('recruits')->orderBy('penter_date', 'DESC')->get();
       return view('recruits', compact('data'));
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
           'dispcode'  => $row['Completion_status'],
           'u_email'   => $row['Email'],
           'pstatus_date'   => $row['pstatus_date'],
           'penter_date'    => $row['Penter_date'],
           'm_recruit_mail_batch'  => $row['Recruitment_Mail_Batch'],
           'm_signup_counter'   => $row['Sign_Up_Counter'],
           'm_gender_expanded' => $row['Gender'],
           'm_age_bands_report' => $row['Age_Band'],
           'datetime' => $row['Date']
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

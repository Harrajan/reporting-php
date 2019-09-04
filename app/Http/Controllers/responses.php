<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class responses_controller extends Controller
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
           'psudonym' => $row['Pseudonym'],
           'pstatus'  => $row['Panel_Status'],
           'pcredit_points' => $row['Panel_Points'],
           'penter_date' => $row['Date_of_Joining Panel'],
           'reg_code' => $row['Where_advertised_from'],
           'numinv1' => $row['Number_of_invites1'],
           'numcpl1' => $row['Number_of_completes1'],
           'numqut1' => $row['Number_of_quits1'],
           'numscn1' => $row['Number_of_screenouts1'],
           'numstr1' => $row['Number_of_survey_starts1'],
           'numinv2' => $row['Number_of_invites2'],
           'numcpl2' => $row['Number_of_completes2'],
           'numqut2' => $row['Number_of_quits2'],
           'numscn2' => $row['Number_of_screenouts2'],
           'numstr2' => $row['Number_of_survey_starts2'],
           'numinv3' => $row['Number_of_invites3'],
           'numcpl3' => $row['Number_of_completes3'],
           'numqut3' => $row['Number_of_quits3'],
           'numscn3' => $row['Number_of_screenout3'],
           'numstr3' => $row['Number_of_survey_starts3'],
           'm_age' => $row['Age'],
           'm_panel_memebers' => $row['Panel Membership'],
           'm_gender_expanded' => $row['Gender']
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

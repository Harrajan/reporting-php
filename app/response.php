<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
      public $fillable => ['pseudonym','pstatus','pcredit_points','penter_date','reg_code','numinv1','numcpl1','numqut1'
  'numscn1','numstr1','numinv2','numcpl2','numqut2','numscn2','numstr2','numinv3','numcpl3','numqut3','numscn3','numstr3','m_age','m_panel_members','m_gender_expanded'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recruit extends Model
{
    public $fillable => ['dispcode','u_email','pstatus_date','penter_date','m_recruit_mail_batch','m_signup_counter','m_gender_expanded','m_age_bands_report','datetime'];
}

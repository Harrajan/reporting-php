<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dispcode');
            $table->string('u_email');
            $table->dateTime('pstatus_date');
            $table->dateTime('penter_date');
            $table->string('m_recruit_mail_batch');
            $table->integer('m_signup_counter');
            $table->string('m_gender_expanded');
            $table->string('m_age_bands_report');
            $table->dateTime('datetime');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruits');
    }
}

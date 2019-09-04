<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnsubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unsubscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pseudonym');
            $table->string('pstatus');
            $table->integer('pcredit_points');
            $table->dateTime('penter_date');
            $table->string('reg_code');
            $table->integer('m_age');
            $table->string('m_gender_expanded',8);
            $table->bigInteger('ats');
            $table->dateTime('datetime');
            $table->integer('rts2082');
            $table->integer('rts2084');
            $table->integer('rts2086');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unsubscriptions');
        
    }
}

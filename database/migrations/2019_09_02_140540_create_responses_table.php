<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('psudonym');
            $table->string('pstatus');
            $table->integer('pcredit_points');
            $table->dateTime('penter_date');
            $table->string('reg_code');
            $table->integer('numinv1');
            $table->integer('numcpl1');
            $table->integer('numqut1');
            $table->integer('numscn1');
            $table->integer('numstr1');
            $table->integer('numinv2');
            $table->integer('numcpl2');
            $table->integer('numqut2');
            $table->integer('numscn2');
            $table->integer('numstr2');
            $table->integer('numinv3');
            $table->integer('numcpl3');
            $table->integer('numqut3');
            $table->integer('numscn3');
            $table->integer('numstr3');
            $table->integer('m_age');
            $table->string('m_panel_members');
            $table->string('m_gender_expanded');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}

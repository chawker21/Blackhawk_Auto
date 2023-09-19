<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('s_m_s_s', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('customer_info_id');
			$table->timestamps();
			 $table->text('Body')->nullable();
		 });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('s_m_s_s'); //
    }
}

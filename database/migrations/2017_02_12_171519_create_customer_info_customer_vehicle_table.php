<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInfoCustomerVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_info_customer_vehicle', function (Blueprint $table) {
			$table->increments('id');
			 $table->integer('customer_info_id')->nullable();
			$table->integer('customer_vehicle_id')->nullable();
			$table->timestamps(); 
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_info_customer_vehicle');//
    }
}

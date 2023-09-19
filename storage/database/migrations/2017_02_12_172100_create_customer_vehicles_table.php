<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('customer_vehicles', function (Blueprint $table) {
			$table->increments('id');
			 $table->integer('customer_info_id')->nullable();
			 $table->string('Vehicle_Make')->nullable();
			 $table->string('Vehicle_Model')->nullable();
			 $table->string('Vehicle_Year')->nullable();
			 $table->string('VIN')->nullable();
			 $table->tinyinteger('Checked_in')->default(0);
			 $table->timestamps(); 
		});//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_vehicles');
    }
}

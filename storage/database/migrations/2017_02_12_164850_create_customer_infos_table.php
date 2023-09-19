<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('customer_info', function (Blueprint $table) {
			$table->increments('id');
			 $table->string('Date')->nullable();
			$table->timestamps();
			$table->string('First_Name')->nullable();
			 $table->string('Last_Name')->nullable();
			 $table->string('Phone_Number')->nullable();
			 $table->string('Vehicle_Make')->nullable();
			 $table->string('Vehicle_Model')->nullable();
			 $table->string('Vehicle_Year')->nullable();
			 $table->string('VIN')->nullable();
			 $table->text('Additional_Info')->nullable();
			 $table->tinyinteger('Checked_in')->default(0);
			 $table->string('invoice')->nullable();
			 $table->mediumText('invoice_number')->nullable();
			 
			 
			});////
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_info');//
    }
}

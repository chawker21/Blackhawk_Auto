<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_notes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('customer_info_id')->nullable();
			$table->text('Additional_note')->nullable();
			$table->timestamps(); 
		}); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_notes');//
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('invoices', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('customer_info_id');
			$table->timestamps();
			 $table->text('invoice_name')->nullable();
			 $table->string('invoice_number')->nullable();
			 $table->decimal('invoice_total', 9,2)->nullable();
			  $table->decimal('profits', 9,2)->nullable();
			  $table->decimal('expenses', 9,2)->nullable();
			 $table->string('type')->nullable();
		 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

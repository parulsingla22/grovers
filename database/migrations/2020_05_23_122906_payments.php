<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->Increments('PaymentId');
			$table->string('orderId');
			$table->string('amount');
			$table->string('discount');
			$table->string('delivery');
			$table->string('total');
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
        Schema::dropIfExists('payments');
    }
}

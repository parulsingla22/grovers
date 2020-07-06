<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		  Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
			$table->string('orderId');
			$table->string('userId');
			$table->string('name');
			$table->string('address');
			$table->string('contact');
			$table->string('paymentId');
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
        //
		
        Schema::dropIfExists('orders');
    }
}

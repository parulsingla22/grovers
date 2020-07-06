<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carttotal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('carttotal', function (Blueprint $table) {
			$table->Increments('id');
			$table->string('userid');
			$table->string('subtotal');
			$table->string('delivery');
			$table->string('discount');
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
        
        Schema::dropIfExists('carttotal');
    }
}

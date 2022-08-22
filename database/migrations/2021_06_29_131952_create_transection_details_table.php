<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transection_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('transactions_id');
            $table->string('username');
            $table->string('nationality');
            $table->boolean('is_visa');
            $table->date('doe_passport');
            $table->softDeletes();
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
        Schema::dropIfExists('transection_details');
    }
}

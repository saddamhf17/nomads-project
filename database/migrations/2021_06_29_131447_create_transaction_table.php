<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('travel_package_id');
            $table->integer('users_id');
            $table->integer('additional_visa');
            $table->integer('transection_total');
            $table->string('transection_status');
            //in_chart, pending, success, cancel, failed
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
        Schema::dropIfExists('transection');
    }
}

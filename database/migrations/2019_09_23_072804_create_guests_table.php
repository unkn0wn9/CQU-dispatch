<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company')->comment('来宾单位');
            $table->unsignedInteger('level')->comment('来宾最高级别');
            $table->unsignedInteger('retinues')->comment('随行人数');
            $table->timestamp('arrive_datetime')->comment('到达时间');
            $table->timestamp('leave_datetime')->comment('离开时间');
            $table->string('arrive_flight')->comment('到达航班');
            $table->string('leave_flight')->comment('离开航班');
            $table->string('hotel')->comment('入住酒店');
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
        Schema::dropIfExists('guests');
    }
}

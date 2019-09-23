<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('car_id')->comment('车辆id');
            $table->unsignedInteger('guest_id')->comment('来宾信息id');
            $table->unsignedInteger('greeter_id')->comment('联系人id');
            $table->timestamp('start_time')->comment('出发时间');
            $table->time('back_time')->comment('返回时间');
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
        Schema::dropIfExists('deliveries');
    }
}

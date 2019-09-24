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
            $table->string('level')->comment('来宾最高级别');
            $table->unsignedInteger('retinues')->comment('随行人数');
            $table->timestamp('arrive_datetime')->comment('到达时间')->default("2019-09-23 00:00:00");
            $table->timestamp('leave_datetime')->comment('离开时间')->default("2019-09-23 00:00:00");
            $table->string('arrive_flight')->comment('到达航班');
            $table->string('leave_flight')->comment('离开航班');
            $table->string('hotel')->comment('入住酒店');
            $table->string('greeter_number')->comment('联系人工号');
            $table->string('greeter_name')->comment('联系人姓名');
            $table->unsignedInteger('greeter_sex')->comment('联系人性别 1为男性 0位女性'); // 1 male 0 female
            $table->string('greeter_company')->comment('联系人单位');
            $table->string('greeter_tel')->comment('联系人电话');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand')->comment('车辆品牌');
            $table->string('license')->comment('车牌号');
            $table->string('color')->comment('车辆颜色');
            $table->string('driver_name')->comment('司机姓名');
            $table->unsignedInteger('driver_sex')->comment('司机性别 1为男性 0为女性'); // 1 male 0 female
            $table->string('driver_tel')->comment('司机电话');
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
        Schema::dropIfExists('cars');
    }
}

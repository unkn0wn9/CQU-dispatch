<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGreetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greeters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->comment('联系人工号');
            $table->string('name')->comment('联系人姓名');
            $table->unsignedInteger('sex')->comment('联系人性别 1为男性 0位女性'); // 1 male 0 female
            $table->string('company')->comment('联系人单位');
            $table->string('tel')->comment('联系人电话');
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
        Schema::dropIfExists('greeters');
    }
}

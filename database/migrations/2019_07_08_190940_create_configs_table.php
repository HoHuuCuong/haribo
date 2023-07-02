<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name', 255)->unique();
            $table->text('value')->nullabled();
            $table->string('label', 255)->nullabled();
            $table->string('small', 255)->nullabled();
            $table->text('description')->nullabled();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('hide')->default(0);
            $table->integer('position')->default(1);
            $table->bigInteger('group_id')->unsigned()->default(1);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
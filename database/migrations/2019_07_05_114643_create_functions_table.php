<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('image', 255)->nullabled();
            $table->string('icon', 255)->nullabled();
            $table->string('name', 255)->nullabled();
            $table->string('route_name', 255)->nullabled();
            $table->string('alias', 255)->nullabled();
            $table->string('uri', 255)->nullabled();
            $table->string('namespace', 255)->nullabled();
            $table->string('controller', 255)->nullabled();
            $table->string('action', 255)->nullabled();
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('hide')->default(0);
            $table->tinyInteger('level')->default(0);
            $table->integer('position')->default(1);
            $table->tinyInteger('allow')->default(0);
            $table->tinyInteger('display')->default(1);
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
        Schema::dropIfExists('functions');
    }
}
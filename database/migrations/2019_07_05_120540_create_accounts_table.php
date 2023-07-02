<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('avatar', 255)->nullabled();
            $table->string('username', 255)->unique();
            $table->string('password', 255)->nullabled();
            $table->string('name', 255)->nullabled();
            $table->string('email', 255)->nullabled()->unique();
            $table->string('phone', 255)->nullabled()->unique();
            $table->string('token')->nullabled();
            $table->rememberToken();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_root')->default(0);
            $table->tinyInteger('level')->default(1);
            $table->tinyInteger('hide')->default(0);
            $table->bigInteger('group_id')->unsigned()->nullabled();
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
        Schema::dropIfExists('accounts');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::dropIfExists('users');
        // Schema::dropIfExists('fields');
        // Schema::dropIfExists('field_user');

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->integer('type')->default(0);
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->text('password',500);
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('label');
            $table->string('identifier');
            $table->integer('type')->default(0);
        });

        Schema::create('field_user', function (Blueprint $table) {
            $table -> bigIncrements('id')->autoIncrement();
            $table -> unsignedBigInteger('user_id');
            $table -> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table -> unsignedBigInteger('field_id');
            $table -> foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table -> string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('field_user');
    }
}

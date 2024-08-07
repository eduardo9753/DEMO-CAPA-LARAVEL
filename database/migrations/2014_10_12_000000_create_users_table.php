<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('document');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->unsignedBigInteger('area_id');  //ambulatorio - emergencia - hospitalario
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');

            $table->unsignedBigInteger('type_id');  //medico - licenciado - administrativo
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

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
        Schema::dropIfExists('users');
    }
}

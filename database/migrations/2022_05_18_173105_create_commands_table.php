<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->string('address_id')->nullable();
            $table->string('status');
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("telephone")->nullable();
            $table->string("address")->nullable();
            $table->string("user_id")->nullable();
            $table->longText("note")->nullable();
            $table->unsignedBigInteger('price')->default(0);
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
        Schema::dropIfExists('commands');
    }
}

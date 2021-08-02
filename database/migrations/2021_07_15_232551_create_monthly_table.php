<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly', function (Blueprint $table) {
            $table->id();
            $table->string('employees_name');
            $table->unsignedInteger('overtime');
            $table->unsignedInteger('discount');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employees_id');


            $table->foreign('user_id') ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('employees_id') ->references('id')
            ->on('employees')
            ->onDelete('cascade');

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
        Schema::dropIfExists('monthly');
    }
}

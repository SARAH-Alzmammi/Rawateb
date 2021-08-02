<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('insurance', $precision = 8, $scale = 2);
            $table->decimal('basic', $precision = 8, $scale = 2);
            $table->decimal('transportationAllowance', $precision = 8, $scale = 2);
            $table->decimal('residencyAllowance', $precision = 8, $scale = 2);
            $table->decimal('original', $precision = 8, $scale = 2);
            $table->decimal('actual', $precision = 8, $scale = 2);
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->foreign('user_id') ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->integer('hours');
            $table->timestamps();
        });
    }
    // insurance
    // basic
    // transportationAllowance
    // residencyAllowance
    // actual
    // user_id

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

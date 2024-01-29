<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi', function (Blueprint $table) {
            $table->id();
            $table->string('Objectives_No')->nullable();
            $table->string('Objectives_Type')->nullable();
            $table->longText('Objectives_Objective')->nullable();
            $table->longText('Objectives_Results')->nullable();
            $table->string('Objectives_Target')->nullable();
            $table->string('Objectives_Weighting')->nullable();
            $table->string('Review_No')->nullable();
            $table->string('Review_Self_Rating')->nullable();
            $table->string('Review_Manager_Rating')->nullable();
            $table->longText('Review_Comments_Employee')->nullable();
            $table->longText('Review_Comments_Manager')->nullable();
            $table->string('Development_Type')->nullable();
            $table->string('Development_Level')->nullable();
            $table->longText('Development_Descripsion')->nullable();
            $table->string('Development_Target')->nullable();
            $table->string('Development_Cost')->nullable();
            $table->string('Summary_Rating')->nullable();
            $table->unsignedBigInteger('Manager_id')->nullable();
            $table->foreign('Manager_id')->references('id')->on('managers')->onDelete('set null');
            $table->longText('Manager_Signature')->nullable();
            $table->longText('Emp_Signature')->nullable();
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
        Schema::dropIfExists('kpi');
    }
}

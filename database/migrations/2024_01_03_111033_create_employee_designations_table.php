<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Schema::create('employee_designations', function (Blueprint $table) {
//            $table->id();
//
//            $table->foreign('designation_id')->references('id')->on('designations');
//            $table->unsignedInteger('designation_id')->nullable();
//
//            $table->foreign('employee_id')->references('id')->on('employees');
//            $table->unsignedInteger('employee_id')->nullable();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      //  Schema::dropIfExists('employee_designations');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_certificate', function (Blueprint $table) {
            $table->id();
            $table->string('EmpCode');
            $table->string('EmpName');
            $table->string('Nationality');
            $table->string('Designation');
            $table->string('ProjectDepartmentName');
            $table->string('ProjectDepartmentNumber');
            $table->date('BirthDate');
            $table->string('Passport');
            $table->string('EmplAcco');
            $table->string('ArabicName');
            $table->string('ArabicJobTitle');
            $table->string('ArabicNationality');
            $table->string('Visa');
            $table->string('Gender');
            $table->date('JoiningDate');
            $table->string('TotalSalary'); // Adjust the precision and scale as needed
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
        Schema::dropIfExists('employees_certificate');
    }
}

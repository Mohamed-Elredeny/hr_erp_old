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
            $table->string('status')->nullable();
            $table->string('empCode')->nullable();
            $table->string('empName')->nullable();
            $table->string('nationality')->nullable();
            $table->string('designation')->nullable();
            $table->string('projectDepartmentNumber')->nullable();
            $table->string('projectDeptName')->nullable();
            $table->string('minimum')->nullable();
            $table->string('maximum')->nullable();
            $table->string('class')->nullable();
            $table->string('jobFamily')->nullable();
            $table->string('jobCode')->nullable();
            $table->string('categoryPayroll')->nullable();
            $table->string('empAcc')->nullable();
            $table->string('joiningDate')->nullable();
            $table->string('service')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('age')->nullable();
            $table->longText('warning')->nullable();
            $table->string('payType')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('vacDays')->nullable();
            $table->string('sector')->nullable();
            $table->string('ticketAmount')->nullable();
            $table->string('noOfTickets')->nullable();
            $table->string('familyStat')->nullable();
            $table->string('settDate')->nullable();
            $table->string('campedsc')->nullable();
            $table->string('passportNo')->nullable();
            $table->string('passportValidity')->nullable();
            $table->string('visaNo')->nullable();
            $table->string('visaExpiry')->nullable();
            $table->string('visaType')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('sex')->nullable();
            $table->string('empStatus')->nullable();
            $table->string('effectiveDate')->nullable();
            $table->string('visaIssueDate')->nullable();
            $table->string('emailWork')->nullable();
            $table->string('mobileWork')->nullable();
            $table->string('mobile')->nullable();
            $table->string('finger')->nullable();
            $table->string('medical')->nullable();
            $table->string('dutyResumption')->nullable();
            $table->string('hcCode')->nullable();
            $table->string('hcExpDate')->nullable();
            $table->string('agency')->nullable();
            $table->string('basic')->nullable();
            $table->string('hra')->nullable();
            $table->string('ta')->nullable();
            $table->string('fixedOt')->nullable();
            $table->string('otherAllowance')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('employees');
    }
}

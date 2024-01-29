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
        Schema::table('employees', function (Blueprint $table) {
            $table->text('grade')->nullable();
            $table->text('food')->nullable();
            $table->text('oTMedgulf')->nullable();
            $table->text('telephoneOT')->nullable();
            $table->text('other')->nullable();
            $table->text('pPCEDSC')->nullable();
            $table->text('jLGC_EMPCARD_GRADE')->nullable();
            $table->text('mOBIRANGE')->nullable();
            $table->text('national_Add_Remarks')->nullable();
            $table->text('national_Add_STS')->nullable();
            $table->text('license')->nullable();
            $table->text('cARVALID')->nullable();
            $table->text('last_resump_Laeve')->nullable();
            $table->text('leave_Entitl_Days')->nullable();
            $table->text('leave_Settled_Date')->nullable();
            $table->text('leave_Settled_Date_generated')->nullable();
            $table->text('flight_Ticket_Sector')->nullable();
            $table->text('available_Employee_Leaves')->nullable();
            $table->text('job_Expire')->nullable();
            $table->text('last_Date_Flight_Ticket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};

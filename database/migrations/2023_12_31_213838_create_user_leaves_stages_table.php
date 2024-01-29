<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_leaves_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leave_id');
            $table->foreign('leave_id')->references('id')->on('leaves');

            $table->unsignedBigInteger('responsible_employee');
            $table->foreign('responsible_employee')->references('id')->on('employees');

            $table->string('stage_name');

            $table->text('comments')->nullable();

            $table->text('attachments')->nullable();

            $table->text('extraInfo')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_leaves_stages');
    }
};

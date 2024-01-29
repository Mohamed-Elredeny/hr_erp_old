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
        Schema::create('welcome_notes_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('emp_sender_request')->nullable();
            $table->foreign('emp_sender_request')->references('id')->on('employees')->onDelete('set null');

            $table->unsignedBigInteger('new_emp_request')->nullable();
            $table->foreign('new_emp_request')->references('id')->on('employees')->onDelete('set null');

            $table->unsignedBigInteger('emp_receiver_request')->nullable();
            $table->foreign('emp_receiver_request')->references('id')->on('employees')->onDelete('set null');

            $table->string('status')->default('pending');

            $table->string('type')->nullable();

            $table->string('request_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_notes_requests');
    }
};

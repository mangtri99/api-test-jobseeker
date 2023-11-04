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
        Schema::create('t_candidate', function (Blueprint $table) {
            $table->bigInteger('candidate_id')->autoIncrement();
            $table->string('email', 255)->unique();
            $table->string('phone_number', 15)->unique()->nullable();
            $table->string('full_name', 255);
            $table->string('dob', 10);
            $table->string('pob', 255);
            $table->string('gender', 1);
            $table->string('year_exp', 5);
            $table->string('last_salary', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->date('birthDate')->nullable();
            $table->string('bloodType')->nullable();
            $table->text('allergies')->nullable();
            $table->string('medicationName')->nullable();
            $table->string('medicationFrequency')->nullable();
            $table->text('conditions')->nullable();
            $table->string('emergencyContact')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

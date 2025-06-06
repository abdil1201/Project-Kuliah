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
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['date', 'duration']); // Drop kolom lama jika ada
            $table->dateTime('start_time')->after('description');
            $table->dateTime('end_time')->after('start_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['start_time', 'end_time']);
            $table->date('date')->after('description'); // Kembalikan kolom lama
            $table->integer('duration')->nullable()->after('date');
        });
    }
}; 
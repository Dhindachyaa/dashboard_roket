<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    // Tabel untuk menampung data IoT & AI
    Schema::create('sensor_logs', function (Blueprint $table) {
        $table->id();
        $table->float('temp');
        $table->float('humidity');
        $table->float('co_level');
        $table->float('pm25');
        $table->string('smoke_status'); // AMAN/BAHAYA (SVM)
        $table->string('aqi_status');   // SEHAT/TIDAK SEHAT (Decision Tree)
        $table->timestamps();
    });

    // Tabel untuk Review dari Guest
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->string('name')->default('Guest');
        $table->integer('rating');
        $table->text('comment');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('roket_tables');
    }
};

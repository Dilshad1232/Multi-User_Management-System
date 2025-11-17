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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g. Pending, Approved, Rejected
            $table->string('color')->nullable(); // optional: UI use (like #ffc107)
            $table->timestamps();
        });

        // ✅ Insert default statuses
        DB::table('statuses')->insert([
            ['name' => 'Pending', 'color' => '#ffc107'],
            ['name' => 'Approved', 'color' => '#28a745'],
            ['name' => 'Rejected', 'color' => '#dc3545'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};

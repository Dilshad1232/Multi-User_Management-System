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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // किसने action लिया
            $table->string('action'); // जैसे "Created Submission", "Updated Profile"
            $table->string('model_type')->nullable(); // Model type e.g., Submission, User
            $table->unsignedBigInteger('model_id')->nullable(); // Specific record ID
            $table->ipAddress('ip_address')->nullable(); // किस IP से हुआ
            $table->text('details')->nullable(); // Extra info JSON or text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

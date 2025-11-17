<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This table stores all user submissions.
     * Each submission belongs to a user and has a status (Pending, Approved, Rejected).
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();

            // 🧑‍💼 User who submitted (relation with users table)
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // If user deleted → submissions also deleted

            // 📋 Current status (Pending / Approved / Rejected)
            $table->foreignId('status_id')
                  ->default(1) // Default: Pending
                  ->constrained('statuses')
                  ->onDelete('restrict'); // Prevent accidental deletion of status

            // 🧾 Submission Details
            $table->string('title');                     // Title of submission
            $table->text('description')->nullable();     // Optional details
            $table->string('document_path')->nullable(); // File upload path (e.g., storage/submissions/...)

            // 🧠 Admin feedback (for approved/rejected)
            $table->text('admin_remarks')->nullable();

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};

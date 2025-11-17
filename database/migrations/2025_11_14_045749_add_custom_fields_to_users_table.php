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
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mobile_no', 15)->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('pin_code', 10)->nullable();
            $table->string('profile_photo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'father_name',
                'mobile_no',
                'address',
                'district',
                'pin_code',
                'profile_photo',
            ]);
        });
    }

};

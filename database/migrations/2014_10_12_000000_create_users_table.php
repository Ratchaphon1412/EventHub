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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name', 100)->nullable()->comment('First name');
            $table->string('last_name', 100)->nullable()->comment('Last name');
            $table->string('phone', 20)->nullable()->comment('Phone number');
            $table->enum('gender',['Female','Male','Other'])->default('Other');
            $table->integer('age')->nullable()->comment('Age');
            $table->string('facebook', 255)->nullable()->comment('facebook');
            $table->string('instagram', 255)->nullable()->comment('instagram');
            $table->string('line', 255)->nullable()->comment('line id');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

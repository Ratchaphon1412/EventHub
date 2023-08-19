<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Category;
use App\Models\EventImage;
use App\Models\User;
use App\Models\Team;
use App\Models\Kanban;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignIdFor(Category::class);
            $table->string("image_poster");
            $table->dateTime('registration_start_date');
            $table->dateTime('registration_end_date');
            $table->dateTime("announcement_date")->nullable();
            $table->dateTime("event_start_date");
            $table->dateTime("event_end_date");
            $table->double("event_latitude")->nullable();
            $table->double("event_longitude")->nullable();
            $table->string("document_payment")->nullable();
            $table->text("location_detail");
            $table->text("contact")->nullable();
            $table->text("location_name")->nullable();
            $table->boolean("question")->default(false);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('message')->nullable();  // Assuming you might want this to be optional
            $table->string('user_type');  // Assuming you also need to store the user type
            $table->string('email')->unique();

            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};

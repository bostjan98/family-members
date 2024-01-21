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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Reference to users table
            $table->string('name'); // Name of the family member
            $table->foreignId('relationship_id')->nullable()->constrained('relationships'); // Optional reference to predefined relationships
            $table->foreignId('relation_name_id')->nullable()->constrained('users'); // Reference to users table for the relationship name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};

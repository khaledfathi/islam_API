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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false); 
            $table->string('phone')->nullable(false); 
            $table->text('address')->nullable(false); 
            $table->string('working_hours')->nullable(true); 
            $table->text('description')->nullable(true); 
            $table->text('image')->nullable(false); 
            $table->enum('service_type',['clinics' , 'shelter'])->nullable(false); 
            $table->enum('animal_type',['cat','dog'])->nullable(true); 
            $table->enum('approval',['pending','approved','rejected'])->nullable(false)->default('pending'); 
            $table->timestamps();
            //FK
            $table->foreignId('user_id')->nullable(true)->references('id')->on('users')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

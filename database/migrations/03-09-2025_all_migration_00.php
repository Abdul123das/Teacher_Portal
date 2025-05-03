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
        // Schema::create('teachers', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->text('detail');
        //     $table->timestamps();
        // });

        // Schema::create('teachers', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('phone')->nullable();
        //     $table->text('address')->nullable();
        //     $table->date('date_of_birth')->nullable();
        //     $table->string('gender')->nullable();
        //     $table->string('profile_picture')->nullable();
        //     $table->string('grade_level');
        //     $table->string('parent_name')->nullable();
        //     $table->string('parent_contact')->nullable();
        //     $table->text('detail')->nullable();
        //     $table->text('remarks')->nullable();
        //     $table->timestamps();
        // });

        // Schema::table('teachers', function (Blueprint $table) {
        //     $table->date('date_of_birth')->nullable()->after('address');
        // });

        Schema::create('teacher_document', function (Blueprint $table) {
            $table->id('document_id');
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('file');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('products');
    }
};

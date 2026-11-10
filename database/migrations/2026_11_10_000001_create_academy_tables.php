<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->default('fas fa-desktop');
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('instructor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->default('course_thumbnail_default_12.jpg');
            $table->string('preview_video')->default('6967239b0c4d623.mp4');
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->string('level')->default('Beginner');
            $table->string('language')->default('English');
            $table->string('duration')->default('00:55:00 Hours');
            $table->unsignedTinyInteger('rating')->default(0);
            $table->unsignedInteger('lessons_count')->default(4);
            $table->unsignedInteger('quizzes_count')->default(1);
            $table->boolean('is_top')->default(true);
            $table->json('outcomes')->nullable();
            $table->json('requirements')->nullable();
            $table->timestamps();
        });

        Schema::create('course_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->string('title');
            $table->unsignedInteger('sort_order')->default(1);
            $table->timestamps();
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_section_id')->constrained('course_sections')->cascadeOnDelete();
            $table->string('title');
            $table->string('duration')->default('00:05:13');
            $table->string('video_url')->default('6967d9d02be6648.mp4');
            $table->string('lesson_type')->default('video'); // video, document
            $table->unsignedInteger('sort_order')->default(1);
            $table->timestamps();
        });

        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->unsignedTinyInteger('progress')->default(0);
            $table->timestamps();
            $table->unique(['user_id', 'course_id']);
        });

        Schema::create('ingenieros_cip', function (Blueprint $table) {
            $table->id();
            $table->string('cip', 8)->unique();
            $table->string('nombre');
            $table->string('especialidad')->default('Ingeniería de Sistemas');
            $table->string('sede')->default('CIP Sede Cusco');
            $table->boolean('habilitado')->default(true);
            $table->decimal('deuda', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingenieros_cip');
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('course_sections');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('categories');
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'category_id',
        'instructor_id',
        'title',
        'slug',
        'subtitle',
        'description',
        'image',
        'preview_video',
        'price',
        'old_price',
        'level',
        'language',
        'duration',
        'rating',
        'lessons_count',
        'quizzes_count',
        'is_top',
        'outcomes',
        'requirements',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'old_price' => 'decimal:2',
            'is_top' => 'boolean',
            'outcomes' => 'array',
            'requirements' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(CourseSection::class)->orderBy('sort_order');
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function toCardArray(bool $popover = true): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'instructor' => $this->instructor?->name ?? 'Tutoriales a tu Alcance',
            'image' => $this->image,
            'rating' => $this->rating,
            'old_price' => $this->old_price ? '$' . rtrim(rtrim(number_format((float) $this->old_price, 2), '0'), '.') : null,
            'price' => '$' . rtrim(rtrim(number_format((float) $this->price, 2), '0'), '.'),
            'popover' => $popover,
            'updated' => $this->updated_at ? $this->updated_at->format('D, d-M-Y') : 'Wed, 14-Jan-2026',
            'lessons' => $this->lessons_count . ' Lessons',
            'duration' => $this->duration,
            'language' => $this->language,
            'level' => $this->level,
            'subtitle' => $this->subtitle,
            'outcomes' => $this->outcomes ?? [],
        ];
    }
}

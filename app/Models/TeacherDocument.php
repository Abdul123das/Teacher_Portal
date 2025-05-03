<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeacherDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'teacher_id',
        'title',
        'document'

    ];

    protected $casts = [
        '' => '',
    ];

    protected function document(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? asset('images/default-profile.png')
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords(strtolower($value))
        );
    }

    // public function students(): HasMany
    // {
    //     return $this->hasMany(Student::class);
    // }

    /**
     * Scope for searching teachers by name, email, phone, or address.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%");
            });
        }

        return $query;
    }
}

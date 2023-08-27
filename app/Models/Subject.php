<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'full_mark', 'grade_id'];

    /**
     * @return BelongsTo
     * @description Get The grade the subject belongs to
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
}

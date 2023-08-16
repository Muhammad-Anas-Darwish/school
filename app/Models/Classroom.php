<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'grade_id'];

    /**
     * 
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
}

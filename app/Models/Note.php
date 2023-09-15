<?php

namespace App\Models;

use App\Exceptions\YearsTableEmptyException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['year_id', 'student_id', 'type', 'been_read'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($note) {
            if (Year::getCurrentYear() === null)
                throw new  YearsTableEmptyException();
            $note->year_id = Year::getCurrentYear();
        });
    }

    /**
     * Get all notes that have not been read by the student
     */
    protected static function getAllUnreadNotes(Student $student): int
    {
        return static::where('student_id', $student->id)->where('been_read', false)->count();
    }

    /**
     * @return BelongsTo
     * @description Get the year to which the note belongs
     */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    /**
     * @return BelongsTo
     * @description Get the student to which the note belongs
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}

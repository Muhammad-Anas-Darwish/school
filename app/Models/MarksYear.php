<?php

namespace App\Models;

use App\Exceptions\SemestersTableEmptyException;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\YearsTableEmptyException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarksYear extends Model
{
    use HasFactory;

    protected $table = 'marks_year';

    protected $fillable = [
        'mark',
        'type',
        'been_read',
        'student_id',
        'subject_id',
        'grade_id',
        'year_id',
        'semester_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($markYear) {
            if (Year::getCurrentYear() === null)
                throw new YearsTableEmptyException();

            if (Semester::getCurrentSemester() === null)
                throw new SemestersTableEmptyException();

            $markYear->year_id = Year::getCurrentYear();
            $markYear->semester_id = Semester::getCurrentSemester();
            $markYear->grade_id = $markYear->student->grade_id;
        });
    }

    /**
     * Get all mark year that have not been read by the student
     */
    protected static function getAllUnreadMarkYear(Student $student): int
    {
        return static::where('student_id', $student->id)->where('been_read', false)->count();
    }

    /**
    * @return BelongsTo
    * @description Get The student the makrs year belongs to
    */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
    * @return BelongsTo
    * @description Get The subject the makrs year belongs to
    */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
    * @return BelongsTo
    * @description Get The grade the marks year belongs to
    */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
    * @return BelongsTo
    * @description Get The year the marks year belongs to
    */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    /**
    * @return BelongsTo
    * @description Get The semester the marks year belongs to
    */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }
}

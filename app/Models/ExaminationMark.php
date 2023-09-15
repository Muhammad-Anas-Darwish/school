<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ExamTableEmptyException;
use App\Exceptions\YearsTableEmptyException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExaminationMark extends Model
{
    use HasFactory;

    protected $fillable = ['mark', 'student_id', 'subject_id', 'grade_id', 'year_id', 'exam_id', 'been_read'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($examinationMarks) {
            if (Year::getCurrentYear() === null)
                throw new YearsTableEmptyException();

            if (Exam::getCurrentExam() === null)
                throw new ExamTableEmptyException();

            $examinationMarks->year_id = Year::getCurrentYear();
            $examinationMarks->exam_id = Exam::getCurrentExam();
            $examinationMarks->grade_id = $examinationMarks->student->grade_id;
        });
    }

    /**
     * Get all examination marks that have not been read by the student
     */
    protected static function getAllUnreadExaminationMarks(Student $student): int
    {
        return static::where('student_id', $student->id)->where('been_read', false)->count();
    }

    /**
    * @return BelongsTo
    * @description Get The student the examination marks belongs to
    */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
    * @return BelongsTo
    * @description Get The subject the examination marks belongs to
    */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
    * @return BelongsTo
    * @description Get The grade the examination marks belongs to
    */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
    * @return BelongsTo
    * @description Get The year the examination marks belongs to
    */
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

    /**
    * @return BelongsTo
    * @description Get The exam the examination marks belongs to
    */
    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }
}

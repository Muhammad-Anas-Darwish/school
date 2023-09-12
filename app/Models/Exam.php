<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'semester_id', 'current_exam'];

    /**
     * Change All Current exams to false and set one of them true
     */
    public static function setCurrentExam($currentId): void
    {
        // Set all values false
        (new static)->where('current_exam', true)->update(['current_exam' => false]);

        $exam = (new static)->find($currentId);
        if ($exam)
            $exam->update(['current_exam' => true]);
    }

     /**
     * @return int
     * get id of current exam
     */
    public static function getCurrentExam(): int | null
    {
        $exam = (new static)::where('current_exam', true)->first();
        if (!$exam)
            return null;
        return $exam->id;
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}

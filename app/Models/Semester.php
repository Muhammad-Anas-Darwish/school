<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'current_semester'];

    /**
     * Change All Current semester to false and set one of them true
     */
    public static function setCurrentSemester($currentId): void
    {
        // Set all values false
        (new static)->where('current_semester', true)->update(['current_semester' => false]);

        $semester = (new static)->find($currentId);
        if ($semester)
            $semester->update(['current_semester' => true]);
    }

     /**
     * @return int
     * get id of current semester
     */
    public static function getCurrentSemester(): int | null
    {
        $semester = (new static)::where('current_semester', true)->first();
        if (!$semester)
            return null;
        return $semester->id;
    }
}

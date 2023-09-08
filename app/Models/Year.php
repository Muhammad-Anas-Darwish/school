<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'current_year'];

    /**
     * Change All Current years to false and set one of them true
     */
    public static function setCurrentYear($currentId): void
    {
        // Set all values false
        (new static)->where('current_year', true)->update(['current_year' => false]);

        $year = (new static)->find($currentId);
        if ($year)
            $year->update(['current_year' => true]);
    }

     /**
     * @return int
     * get id of current year
     */
    public static function getCurrentYear(): int | null
    {
        $year = (new static)::where('current_year', true)->first();
        if (!$year)
            return null;
        return $year->id;
    }
}

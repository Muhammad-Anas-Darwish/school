<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    /**
     * @return int
     * get id of this year
     */
    public static function getThisYear(): int | null
    {
        $year = self::latest('id')->first();
        if (!$year)
            return null;
        return $year->id;
    }
}

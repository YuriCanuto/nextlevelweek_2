<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $table = 'class_schedule';

    protected $fillable = [
        'class_id',
        'week_day',
        'from',
        'to'
    ];

    /**
     * Relations
     */
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}

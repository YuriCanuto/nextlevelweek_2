<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'cost',
    ];

    /**
     * Scopes
     */
    public function scopeClassScheduleWeekDay($query, $request)
    {
        $week_day = $request->week_day;
        return $query->whereHas('class_schedules', function($q) use ($week_day) {
            $q->where('week_day', $week_day);
        });
    }

    public function scopeClassScheduleTime($query, $request)
    {
        $time = convertHourToMinutes($request->time);
        return $query->whereHas('class_schedules', function($q) use ($time) {
            $q->where('from', '<=', $time);
            $q->where('to', '>', $time);
        });
    }

    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class_schedules()
    {
        return $this->hasMany(ClassSchedule::class, 'class_id');
    }
}

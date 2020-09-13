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
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class_schedules()
    {
        return $this->hasMany(Classes::class, 'class_id');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\{User, Classes};
use Illuminate\Http\Request;
use App\Http\Resources\Classes as ClassResource;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    protected $users;
    protected $classes;

    public function __construct(User $users, Classes $classes)
    {
        $this->users   = $users;
        $this->classes = $classes;
    }

    public function index(Request $request)
    {
        $query = $this->classes->orderBy('id', 'DESC');

        if ($request->filled('subject')) {
            $query->where('subject', $request->subject);
        }

        if ($request->filled('week_day')) {
            $query->classScheduleWeekDay($request);
        }

        if ($request->filled('time')) {
            $query->classScheduleTime($request);
        }

        return ClassResource::collection($query->get());
    }
}

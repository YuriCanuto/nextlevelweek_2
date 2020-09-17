<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return UserResource::collection($this->users->get());
    }

    public function store(Request $request)
    {
        $validate = validator($request->all(),[
            'name'                => 'required|max:100',
            'avatar'              => 'required',
            'whatsapp'            => 'required|phone:BR|max:16',
            'bio'                 => 'required',
            'subject'             => 'required|max:255',
            'cost'                => 'required',
            'schedule.0.week_day' => 'required',
            'schedule.0.from'     => 'required',
            'schedule.0.to'       => 'required',
        ]);

        // If fails validate
        if($validate->fails()) {
            // Return error response
            return response()->json([
                'success' => false,
                'data'    => $validate->getMessageBag()
            ], 400);
        }

        try {
            DB::beginTransaction();

            $user = $this->users->create($request->all());

            $class = $user->classes()->create($request->all());

            $class->class_schedules()->createMany($this->scheduleMap($request));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Create user',
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            // report($e);

            return response()->json([
                'success' => false,
                'message' => 'Failed to create user',
            ], 400);
        }
    }
}

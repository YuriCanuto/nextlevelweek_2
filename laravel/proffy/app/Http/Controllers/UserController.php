<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;


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
        // return $request->all();
        try {
            $this->users->create($request->all());
        } catch (\Exception $e) {
            return $e;
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\{User, Connection};
use Illuminate\Http\Request;
use App\Http\Resources\Connection as ConnectionResource;
use Illuminate\Support\Facades\DB;

class ConnectionController extends Controller
{
    protected $users;
    protected $connections;

    public function __construct(User $users, Connection $connections)
    {
        $this->users       = $users;
        $this->connections = $connections;
    }

    public function index(Request $request)
    {

        $result = DB::table('connections')
                        ->select(
                            'user_id',
                            'users.name',
                             DB::raw('count(user_id) AS total'))
                        ->join('users', 'users.id', '=', 'connections.user_id')
                        ->groupBy('user_id')
                        ->get();

        return ConnectionResource::collection($result);
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = $this->users->findOrFail($request->user_id);
            $user->connections()->create();

            DB::commit();

            return response()->json([], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            // report($e);

            return response()->json([
                'success' => false,
                'message' => 'Failed to create connection',
            ], 400);
        }
    }
}

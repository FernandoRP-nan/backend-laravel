<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUser(User $user)
    {
        return $user;
    }

    public function upsert(User $user)
    {
        return $user;
    }

    public function getUserByEmail(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            $user->name = $request -> get('name');
            $user->saveOrFail();
            DB::commit();
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        } catch (\Throwable $th){
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
        }
    }
    public function update2(User $user,$todoId, Request $request){
        DB::beginTransaction();
        try {

            $user->name = $request->get('name');
            $user->saveOrFail();
            DB::commit();
            return response()->json([
                'success' => true,
                'user' => $user,
                'todoId' => $todoId
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'line' => $th->getLine(),
                'file' => $th->getFile(),
            ]);
        }

    }

}

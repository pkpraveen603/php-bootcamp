<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAllUsers(): JsonResponse
    {
        $users = DB::table('users')->get();
        return response()->json([
            'users'=>$users,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     * @return JsonResponse
     */
    public function getUserByID(int $id): JsonResponse
    {
        //
        $user = DB::table('users')->find($id);
        return response()->json([
            'user'=>$user,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createUserByID(Request $request): JsonResponse
    {
        $firstname = \request('firstname');
        $lastname = \request('lastname');

        $data = array('firstname'=>$firstname,'lastname'=>$lastname);
        $id = DB::table('users')->insertGetId($data);
        return response()->json([
            'id'=>$id,
            'firstname'=>$firstname,
            'lastname'=>$lastname]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        DB::table('users')->delete($id);
        return response()->json([
            'message'=>"User deleted successfully",
        ]);
        //
    }
}

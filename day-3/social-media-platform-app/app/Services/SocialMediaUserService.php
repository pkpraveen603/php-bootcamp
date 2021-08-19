<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialMediaUserService {

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
        ],200);
    }

    /**
     * Create the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createUser(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob'=> 'required'
        ]);

        $name = \request('name');
        $email = \request('email');
        $dob = \request('dob');
        $data = array('name'=>$name,'email'=>$email,'dob'=>$dob);
        $id = DB::table('users')->insertGetId($data);
        return response()->json([
            'id'=>$id,
            'name'=>$name,
            'email'=>$email,
            'dob'=>$dob]);
    }

    /**
     * Update the resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateUser(Request $request, int $id): JsonResponse
    {

        if (!DB::table('users')->where('id',$id)->exists()){
            return response()->json(['message'=>'user does not exist'],500);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dob'=> 'required'
        ]);

        $name = \request('name');
        $email = \request('email');
        $dob = \request('dob');

        $data = array('name'=>$name,'email'=>$email,'dob'=>$dob);
        DB::table('users')
            ->where('id', $id)
            ->update($data);
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteUser(int $id): JsonResponse
    {
        if (!DB::table('users')->where('id',$id)->exists()){
            return response()->json(['message'=>'user does not exist'],500);
        }
        DB::table('users')->delete($id);
        return response()->json([
            'message'=>"User deleted successfully",
        ],200);
        //
    }

}

<?php

namespace App\Services;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'dob'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>'invalid input'],400);
        }

        $name = \request('name');
        $email = \request('email');
        $dob = \request('dob');
        $data = array('name'=>$name,'email'=>$email,'dob'=>$dob);
        $user = User::create($data);
        return response()->json($user);
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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'dob'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>'invalid input'],400);
        }

        $name = \request('name');
        $email = \request('email');
        $dob = \request('dob');

        $data = array('name'=>$name,'email'=>$email,'dob'=>$dob);
        User::where('id', $id)->update($data);
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
        User::destroy($id);
        return response()->json([
            'message'=>"User deleted successfully",
        ],200);
        //
    }

}

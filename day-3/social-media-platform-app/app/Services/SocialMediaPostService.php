<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialMediaPostService {

    /**
     * Display a listing of the resource.
     *
     * @param int $user_id
     * @return JsonResponse
     */
    public function getPosts(int $user_id): JsonResponse
    {
        $posts = DB::table('posts')->where('user_id',$user_id)->get();
        return response()->json([
            'posts'=>$posts,
        ],200);
    }

    /**
     * Create the resource.
     *
     * @param Request $request
     * @param int $user_id
     * @return JsonResponse
     */
    public function createPost(Request $request, int $user_id): JsonResponse
    {
        $request->validate([
            'title' => 'bail|required|max:255',
            'body' => 'required',
        ]);
        $body = \request('body');
        $title = \request('title');

        $data = array('body'=>$body,'title'=>$title, 'user_id' => $user_id);
        $id = DB::table('posts')->insertGetId($data);
        return response()->json([
            'id'=>$id,
            'body'=>$body,
            'title'=>$title]);
    }

    /**
     * Update the resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updatePost(Request $request, int $id): JsonResponse
    {
        if (!DB::table('posts')->where('id',$id)->exists()){
            return response()->json(['message'=>'post does not exist'],500);
        }

        $body = \request('body');
        $title = \request('title');

        $request->validate([
            'title' => 'bail|required|max:255',
            'body' => 'required',
        ]);

        $data = array('body'=>$body,'title'=>$title, 'id' => $id);
        DB::table('posts')
            ->where('id', $id)
            ->update($data);

        return response()->json([
            'id'=>$id,
            'body'=>$body,
            'title'=>$title]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deletePost(int $id): JsonResponse
    {
        if (!DB::table('posts')->where('id',$id)->exists()){
            return response()->json(['message'=>'post does not exist'],500);
        }

        return response()->json([
            'message'=>"User deleted successfully",
        ]);
        //
    }

}

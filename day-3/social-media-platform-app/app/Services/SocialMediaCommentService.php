<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialMediaCommentService {

    /**
     * Display a listing of the resource.
     *
     * @param int $post_id
     * @return JsonResponse
     */
    public function getComments(int $post_id): JsonResponse
    {
        $comments = DB::table('comments')->where('post_id',$post_id)->get();
        return response()->json([
            'comments'=>$comments,
        ],200);
    }

    /**
     * Add the resource.
     *
     * @param Request $request
     * @param int $user_id
     * @return JsonResponse
     */
    public function addComment(Request $request, int $user_id): JsonResponse
    {
        $request->validate([
            'comment' => 'bail|required',
            'post_id' => 'required',
        ]);

        if (!DB::table('posts')->where('id',$request->post_id)->exists()){
            return response()->json(['message'=>'post does not exist'],500);
        }

        $post_id = \request('post_id');
        $comment = \request('comment');

        $data = array('post_id'=>$post_id,'comment'=>$comment,'user_id'=>$user_id);
        $id = DB::table('comments')->insertGetId($data);
        return response()->json([
            'id'=>$id,
            'comment'=>$comment,
            'post_id'=>$post_id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteComment(int $id): JsonResponse
    {

        if (!DB::table('posts')->where('id',$id)->exists()){
            return response()->json(['message'=>'post does not exist'],500);
        }

        DB::table('comments')->delete($id);
        return response()->json([
            'message'=>"User deleted successfully",
        ]);
        //
    }

}

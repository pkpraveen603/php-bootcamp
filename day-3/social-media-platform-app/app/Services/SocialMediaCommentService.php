<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SocialMediaCommentService {

    /**
     * Display a listing of the resource.
     *
     * @param int $post_id
     * @return JsonResponse
     */
    public function getComments(int $post_id): JsonResponse
    {
        $comments = Comment::where('post_id',$post_id)->get();
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

        $validator = Validator::make($request->all(), [
            'comment' => 'bail|required',
            'post_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>'invalid input'],400);
        }

        if (!DB::table('posts')->where('id',$request->post_id)->exists()){
            return response()->json(['message'=>'post does not exist'],500);
        }

        if (!DB::table('users')->where('id',$user_id)->exists()){
            return response()->json(['message'=>'user does not exist'],500);
        }

        $post_id = \request('post_id');
        $comment = \request('comment');

        $data = array('post_id'=>$post_id,'comment'=>$comment,'user_id'=>$user_id);
        $comment = Comment::create($data);
        return response()->json($comment);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteComment(int $id): JsonResponse
    {

        if (!DB::table('comments')->where('id',$id)->exists()){
            return response()->json(['message'=>'comment does not exist'],500);
        }

        Comment::destroy($id);
        return response()->json([
            'message'=>"Comment deleted successfully",
        ]);
        //
    }

}

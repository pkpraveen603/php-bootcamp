<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SocialMediaPostService {

    /**
     * Display a listing of the resource.
     *
     * @param int $user_id
     * @return JsonResponse
     */
    public function getPosts(int $user_id): JsonResponse
    {
        $posts = Post::where('user_id',$user_id)->get();
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

        $validator = Validator::make($request->all(), [
            'title' => 'bail|required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>'invalid input'],400);
        }

        if (!DB::table('users')->where('id',$user_id)->exists()){
            return response()->json(['message'=>'user does not exist'],500);
        }

        $body = \request('body');
        $title = \request('title');

        $data = array('body'=>$body,'title'=>$title, 'user_id' => $user_id);
        $post = Post::create($data);
        return response()->json($post);
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

        $validator = Validator::make($request->all(), [
            'title' => 'bail|required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>'invalid input'],400);
        }

        $data = array('body'=>$body,'title'=>$title, 'id' => $id);
        Post::where('id', $id)->update($data);

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
        Post::destroy($id);
        return response()->json([
            'message'=>"Post deleted successfully",
        ]);
        //
    }

}

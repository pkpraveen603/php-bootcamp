<?php

namespace App\Http\Controllers;

use App\Services\SocialMediaCommentService;
use App\Services\SocialMediaPostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $post_id
     * @return JsonResponse
     */
    public function index(int $post_id): JsonResponse
    {
        //
        return (new SocialMediaCommentService())->getComments($post_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param int $user_id
     * @return JsonResponse
     */
    public function store(Request $request, int $user_id): JsonResponse
    {
        //
        return (new SocialMediaCommentService())->addComment($request,$user_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        //
        return (new SocialMediaCommentService())->deleteComment($id);
    }
}

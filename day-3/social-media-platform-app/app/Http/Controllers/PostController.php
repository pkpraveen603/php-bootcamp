<?php

namespace App\Http\Controllers;

use App\Services\SocialMediaPostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $user_id
     * @return JsonResponse
     */
    public function index(int $user_id): JsonResponse
    {
        //
        return (new SocialMediaPostService())->getPosts($user_id);
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
        return (new SocialMediaPostService())->createPost($request,$user_id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request,int $id): JsonResponse
    {
        //
        return (new SocialMediaPostService())->updatePost($request,$id);
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
        return (new SocialMediaPostService())->deletePost($id);
    }
}

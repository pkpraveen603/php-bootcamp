<?php

namespace App\Http\Controllers;

use App\Services\SocialMediaUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        //
        return (new SocialMediaUserService)->getAllUsers();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        //
        return (new SocialMediaUserService)->createUser($request);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        //
        return (new SocialMediaUserService)->updateUser($request,$id);
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
        return (new SocialMediaUserService)->deleteUser($id);
    }
}

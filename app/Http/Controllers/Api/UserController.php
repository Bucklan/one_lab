<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('created_at', 'asc')->paginate(10);
        return UserResource::collection($user);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        return response()
            ->json(new UserResource($user),
                ResponseAlias::HTTP_CREATED);

    }

    public function show(int $id)
    {
        $userResource = new UserResource(User::findOrFail($id));
        return response()
            ->json($userResource,
                ResponseAlias::HTTP_OK);
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $userResource = new UserResource($user);
        return response()->json($userResource, ResponseAlias::HTTP_OK);
    }

    public function destroy(int $id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}

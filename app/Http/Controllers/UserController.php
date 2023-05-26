<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display all collections.
     * @return \App\Http\Resources\UserResource collection
     */
    public function index(Request $request)
    {
        return UserResource::collection(
            User::paginate($request->get('limit', 25))->load('user_plan.currency', 'user_plan.company', 'user_plan.reservations')
        );
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\SaveUserRequest  $request
     * @return \App\Http\Resources\UserResource
     */
    public function store(SaveUserRequest $request): UserResource
    {
        $reservation = User::create($request->validated());

        return new UserResource($reservation);
    }

    /**
     * Update the specified model.
     *
     * @param  \App\Http\Requests\SaveUserRequest  $request
     * @param  \App\Models\User 
     * @return \App\Http\Resources\UserResource
     */
    public function update(User $user, SaveUserRequest $request): UserResource
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User
     * @return \App\Http\Resources\UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user->load('user_plan.currency', 'user_plan.company', 'user_plan.reservations'));
    }

    /**
     * Soft-Delete model.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response([
            'message' => 'The user has been deleted'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserPlanRequest;
use App\Http\Resources\UserPlanResource;
use App\Models\User;

class UserPlanController extends Controller
{
    public function __invoke(SaveUserPlanRequest $request, User $user)
    {
        $response = $user->plan()->updateOrCreate(
            ['user_id' => $request->user_id],
            $request->validated()
        );

        return new UserPlanResource($response);
    }
}

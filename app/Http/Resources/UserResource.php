<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data = Arr::except($data, [
            'status',
            'first',
            'updated_at',
            'deleted_at',
            'no_registered',
            'created_at',
            'phone_verify',
            'token_auto_login',
            'email_verified_at',
            'verification_code',
            'new_email'
        ]);

        return $data;
    }
}

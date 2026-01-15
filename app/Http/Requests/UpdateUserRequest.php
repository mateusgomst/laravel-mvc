<?php

namespace App\Http\Requests;

class UpdateUserRequest extends StoreUserRequest
{
    protected function getPasswordRules(): array
    {
        return ['nullable', 'string', 'min:8'];
    }
}

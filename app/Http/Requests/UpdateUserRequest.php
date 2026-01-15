<?php

namespace App\Http\Requests;

class UpdateUserRequest extends StoreUserRequest
{
    /**
     * @return array<int, string>
     */
    protected function getPasswordRules(): array
    {
        return ['nullable', 'string', 'min:8'];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends StoreUserRequest
{
    protected function getPasswordRules(): array  {
       return ['nullable', 'string','min:8'];
    }
}

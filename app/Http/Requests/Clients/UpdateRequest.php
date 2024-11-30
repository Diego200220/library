<?php

namespace app\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateRequest extends FormRequest
{
    public function autorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name'=>"required|string|max:80",
            'last_name'=>"required|string|max:80",
            'membership_card'=>"required|string|max:30",
            ];
    }
}

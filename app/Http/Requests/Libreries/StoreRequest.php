<?php

namespace app\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    public function autorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name'=>"required|string|max:80",
            'slug'=> "required_with:name|string|max:100|unique:libraries,slug",
        ];

    }
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}

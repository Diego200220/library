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
            'title'=>"required|string|max:80",
            'author'=>"required|string|max:60",
            'slug'=> "required_with:title|string|max:100|unique:books,slug".$this->route('Book')->id,
        ];

    }
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }
}

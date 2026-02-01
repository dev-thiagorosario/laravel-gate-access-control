<?php

namespace App\Http\Requests;

use App\Exceptions\DeletePostException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class DeletePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (!auth()->check()) {
            throw new DeletePostException('Usuario nao autenticado');
        }

        $post = $this->route('post');

        Gate::authorize('post.delete', $post);

        return true;
    }

    public function rules(): array
    {
        return [

        ];
    }
}

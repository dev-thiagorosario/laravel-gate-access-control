<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePostRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => trim((string) $this->input('title')),
            'body' => trim((string) $this->input('body', $this->input('content'))),
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string|min:10',
        ];
    }

    public function authorize(): bool
    {
        $post = $this->route('post');

        Gate::authorize('post.update', $post);

        return true;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo titulo deve ser preenchido',
            'title.string' => 'O titulo deve ser um texto valido',
            'title.min' => 'O titulo deve ter no minimo 3 caracteres',
            'title.max' => 'O titulo deve ter no maximo 255 caracteres',

            'body.required' => 'O campo conteudo deve ser preenchido',
            'body.string' => 'O conteudo deve ser um texto valido',
            'body.min' => 'O conteudo deve ter no minimo 10 caracteres',
        ];
    }
}

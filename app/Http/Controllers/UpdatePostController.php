<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\UpdatePostActionInterface;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Throwable;

class UpdatePostController extends Controller
{
    public function __construct(
       private readonly UpdatePostActionInterface $updatePostAction
    ){}

    public function __invoke(UpdatePostRequest $request, Post $post): JsonResponse|RedirectResponse
    {
        try {
            $postId = $post->id;
            
            $validated = $request->validated();

            $this->updatePostAction->execute($postId, $validated);

            if ($request->expectsJson()) {
                return response()
                    ->json(['message' => 'Post atualizado com sucesso'], 200);
            }

            return redirect()
                ->route('dashboard')
                ->with('success', 'Post atualizado com sucesso');
        } catch (Throwable $e) {
            report($e);

            if ($request->expectsJson()) {
                return response()
                    ->json(['message' => 'Ocorreu um erro inesperado.'], 500);
            }

            return redirect()
                ->back()
                ->withErrors(['error' => 'Ocorreu um erro inesperado.'])
                ->withInput();
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\DeletePostActionInterface;
use App\Exceptions\DeletePostException;
use App\Http\Requests\DeletePostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Throwable;

class DeletePostController extends Controller
{
    public function __construct(
        private readonly DeletePostActionInterface $deletePostAction
    ){}

    public function __invoke(DeletePostRequest $request, Post $post): JsonResponse|RedirectResponse
    {
        try {
            $this->deletePostAction->execute($post->id);

            if ($request->expectsJson()) {
                return response()
                    ->json(['message' => 'Post excluido com sucesso'], 200);
            }

            return redirect()
                ->route('dashboard')
                ->with('success', 'Post excluido com sucesso');
        } catch (DeletePostException $e) {
            report($e);

            if ($request->expectsJson()) {
                return response()
                    ->json(['message' => $e->getMessage()], $e->getStatusCode());
            }

            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
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

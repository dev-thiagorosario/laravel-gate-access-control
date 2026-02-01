<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreatePostActionInterface;
use App\Exceptions\CreatePostException;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Throwable;

class CreatePostController extends Controller
{
    public function __construct(
        private readonly CreatePostActionInterface $createPostAction
    ){}

    public function __invoke(CreatePostRequest $request): JsonResponse|RedirectResponse
    {
        try {
            $validated = $request->validated();

            $this->createPostAction->execute($validated);

            if ($request->expectsJson()) {
                return response()
                    ->json(['message' => 'Post criado com sucesso'], 201);
            }

            return redirect()
                ->route('dashboard')
                ->with('success', 'Post criado com sucesso');
        } catch (CreatePostException $e) {
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

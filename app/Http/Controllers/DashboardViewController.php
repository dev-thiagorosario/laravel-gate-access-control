<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\ListPostsActionInterface;
use Illuminate\Contracts\View\View;
use Throwable;

class DashboardViewController extends Controller
{
    public function __construct(
        private readonly ListPostsActionInterface $listPostsAction,
    ){}

    public function __invoke(): View
    {
        try {
            $posts = $this->listPostsAction->execute();

            return view('dashboard', compact('posts'), ['posts' => $posts]);
        } catch (Throwable $e) {
            report($e);

            abort(500, 'An unexpected error occurred.');
        }
    }
}

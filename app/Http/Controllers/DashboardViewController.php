<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\ListPostsActionInterface;
use App\Exceptions\PostListingException;
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
        } catch (PostListingException $e) {
            report($e);

            abort(404, $e->getMessage());
        } catch (Throwable $e) {
            report($e);

            abort(500, 'An unexpected error occurred.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Actions\ListPostsActionInterface;

class ListPostsController extends Controller
{
    public function __construct(
        private readonly ListPostsActionInterface $listPostsAction
    ){}
    public function __invoke(){

    }
}

<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(
        protected Repository $repository,
    )
    {}

    public function __invoke()
    {
        $todos = $this->repository
            ->list(Auth::id())
            ->sortBy('deadline');

        return view('todo.index', ['todos' => $todos]);
    }
}

<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\CreateRequest;
use App\Repositories\Repository;

class CreateController extends Controller
{
    public function __construct(
        protected Repository $repository,
    )
    {}

    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
    }
}

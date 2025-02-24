<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface Repository
{
    public function find(int $id);

    public function list(): Collection;

    public function add(\stdClass|array $data): void;

    public function update(\stdClass|array $data): void;

    public function delete(int $id): void;
}

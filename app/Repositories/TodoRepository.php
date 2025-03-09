<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TodoRepository implements Repository
{
    protected $table = 'todos';

    public function find(int $id): \stdClass|null
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->first();
    }

    public function list(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function add(\stdClass|array $data): void
    {
        DB::table($this->table)->insert((array) $data);
    }

    public function update(int $id, \stdClass|array $data): void
    {
        DB::table($this->table)
            ->where('id', $id)
            ->update((array) $data);
    }

    public function delete(int $id): void
    {
        DB::table($this->table)->delete($id);
    }
}

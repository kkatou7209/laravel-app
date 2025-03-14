<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodoRepository implements Repository
{
    protected $table = 'todos';

    public function find(int $id): \stdClass|null
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function list(int $userId): Collection
    {
        return DB::table($this->table)
            ->where('user_id', $userId)
            ->get();
    }

    public function add(\stdClass|array $data): void
    {
        DB::table($this->table)->insert((array) $data);
    }

    public function update(int $id, \stdClass|array $data): void
    {
        DB::table($this->table)
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->update((array) $data);
    }

    public function delete(int $id): void
    {
        DB::table($this->table)
            ->where('user_id', Auth::id())
            ->delete($id);
    }
}

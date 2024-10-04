<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameRepository
{
    public function all(): Collection
    {
        return Game::with('genres')->get();
    }

    public function find(int $id): Model
    {
        return Game::with('genres')->findOrFail($id);
    }

    public function create(array $data): Collection
    {
        $game = Game::create($data);
        $game->genres()->sync($data['genres']);

        return $game;
    }

    public function update(int $id, array $data): Model
    {
        $game = $this->find($id);
        $game->update($data);
        $game->genres()->sync($data['genres']);

        return $game;
    }

    public function delete(int $id): bool
    {
        $game = $this->find($id);
        $game->genres()->detach();

        return $game->delete();
    }

    public function getByGenre(int $genreId): Collection
    {
        $games = Game::whereHas('genres', function ($query) use ($genreId) {
            $query->where('genre_id', $genreId);
        })->with('genres')->get();

        return $games;
    }
}

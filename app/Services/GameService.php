<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\GameRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameService
{
    protected GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function getAllGames(): Collection
    {
        return $this->gameRepository->all();
    }

    public function getGameById(int $id): Model
    {
        return $this->gameRepository->find($id);
    }

    public function createGame(array $data): Collection
    {
        return $this->gameRepository->create($data);
    }

    public function updateGame(int $id, array $data): Model
    {
        return $this->gameRepository->update($id, $data);
    }

    public function deleteGame(int $id): bool
    {
        return $this->gameRepository->delete($id);
    }

    public function getGamesByGenre(int $genreId): Collection
    {
        return $this->gameRepository->getByGenre($genreId);
    }
}

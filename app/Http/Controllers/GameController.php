<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Services\GameService;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    protected GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->gameService->getAllGames());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->gameService->getGameById($id));
    }

    public function store(StoreGameRequest $request): JsonResponse
    {
        $data = $request->validated();

        return response()->json($this->gameService->createGame($data), 201);
    }

    public function update(StoreGameRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();

        return response()->json($this->gameService->updateGame($id, $data), 201);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->gameService->deleteGame($id);

        return response()->json(null, 204);
    }

    public function getGamesByGenre(int $genreId): JsonResponse
    {
        return response()->json($this->gameService->getGamesByGenre($genreId));
    }
}

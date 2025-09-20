<?php

namespace App\Services;

use App\Models\Game;
use App\Models\User;

class GameService
{
    public function create(User $user, array $data): Game
    {
        $this->authorize($user);

        return Game::create($data);
    }

    public function update(User $user, array $data, Game $game): bool
    {
        $this->authorize($user);

        return $game->update($data);
    }

    public function delete(User $user, Game $game): bool
    {
        $this->authorize($user);

        return $game->delete();
    }

    public function assignToUser(User $user, Game $game, string $acquisitionType = 'free'): void
    {
        // TODO
    }

    public function revokeFromUser(User $user, Game $game): void
    {
        // TODO
    }

    private function authorize(User $user): void
    {
        if (! $user->is_admin) {
            throw new \LogicException('Only admin users can modify this resource.');
        }
    }
}

<?php

namespace App\Services;

use App\Models\News;
use App\Models\User;

class NewsService
{
    public function create(User $user, array $data): News
    {
        $this->authorize($user);

        return News::create($data);
    }

    public function update(User $user, array $data, News $news): bool
    {
        $this->authorize($user);

        return $news->update($data);
    }

    public function delete(User $user, News $news): bool
    {
        $this->authorize($user);

        return $news->delete();
    }

    private function authorize(User $user): void
    {
        if (! $user->is_admin) {
            throw new \LogicException('Only admin users can modify this resource.');
        }
    }
}

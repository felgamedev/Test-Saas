<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryGetRepository;
use Illuminate\Support\Collection;

class GetCategory
{

    public static function getAll(): Collection {
        $categoryGetRepository = new CategoryGetRepository();

        return $categoryGetRepository->getAll();
    }
}

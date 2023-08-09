<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;


class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategory()
    {
        return Category::all();
    }

    public function createCategory($name)
    {
        return Category::create([
            'name' => $name,
        ]);
    }

    public function findById($category_id)
    {
        return Category::find($category_id);
    }
    public function findCategoryByName($name)
    {
        return Category::where('name', $name)->first();
    }
}

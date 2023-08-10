<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryinterface;
use App\Models\Category;


class CategoryRepository implements CategoryRepositoryinterface
{
    public function getAllCategory()
    {
        return Category::all();
    }

    public function createCategory($name)
    {
        return Category::create([
            'category_name' => $name,
        ]);
    }

    public function findById($category_id)
    {
        return Category::find($category_id);
    }
    
    public function findCategoryByName($name)
    {
        return Category::where('category_name', $name)->first();
    }
}

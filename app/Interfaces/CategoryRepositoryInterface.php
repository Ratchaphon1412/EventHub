<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategory();
    public function createCategory($name);
    public function findById($category_id);
    public function findCategoryByName($name);
}

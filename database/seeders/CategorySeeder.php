<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (Category::count() > 0) {
            echo "There are some categorise in database \n";
            return;
        }
        // Category::factory(5)->create();

        $category = new Category();
        $category->category_name = 'Concert';
        $category->category_photo_path = "assets/images/categories/concert.jpg";
        $category->save();

        $category = new Category();
        $category->category_name = 'Seminar';
        $category->category_photo_path = "assets/images/categories/seminar.jpg";
        $category->save();

        $category = new Category();
        $category->category_name = 'Camp';
        $category->category_photo_path = "assets/images/categories/camp.jpg";
        $category->save();

        $category = new Category();
        $category->category_name = 'Charity';
        $category->category_photo_path = "assets/images/categories/charity.jpg";
        $category->save();
    }
}

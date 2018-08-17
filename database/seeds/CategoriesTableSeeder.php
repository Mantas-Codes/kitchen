<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'salad',
                'slug' => str_slug('salad')
            ],
            [
                'name' => 'Nut free',
                'slug' => str_slug('Nut free')
            ],
            [
                'name' => 'Spicy',
                'slug' => str_slug('Spicy')
            ],
            [
                'name' => 'Egg Free',
                'slug' => str_slug('Egg Free')
            ]

        ];

        foreach ($categories as $category) {
            App\Category::create($category);
        }

    }
}

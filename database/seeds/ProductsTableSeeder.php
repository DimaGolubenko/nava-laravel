<?php

use Illuminate\Database\Seeder;
use App\Entity\Product\Product;
use App\Entity\Product\Color;
use App\Entity\Product\Size;
use App\Entity\Product\Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 5)->create()->each(function ($user) {
            $user->sizes()->save(factory(Size::class, 'size')->make());
            $user->colors()->save(factory(Color::class, 'color')->make());
            $user->images()->saveMany(factory(Image::class, 'image', random_int(3, 10))->make());
        });
    }
}

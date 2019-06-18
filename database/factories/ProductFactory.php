<?php

use Faker\Generator as Faker;
use App\Entity\Product\Product;
use App\Entity\Product\Color;
use App\Entity\Product\Size;
use App\Entity\Product\Image;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'description' => $faker->text,
      'price' => $faker->numberBetween($min=950, $max=1500),
    ];
});

$factory->defineAs(Size::class, 'size', function (Faker $faker) {
  return [
    'name' => $faker->name,
    'slug' => $faker->slug,
  ];
});

$factory->defineAs(Color::class, 'color', function (Faker $faker) {
  return [
    'name' => $faker->name,
    'slug' => $faker->slug,
  ];
});

$factory->defineAs(Image::class, 'image', function (Faker $faker) {
  return [
    'name' => 'IMG_20181201_212653_683-01-1134x1098.jpeg',//$faker->imageUrl($width = 1134, $height = 1098),
    'alt' => $faker->word,
    'primary' => false,
  ];
  $primary = !$primary;
});
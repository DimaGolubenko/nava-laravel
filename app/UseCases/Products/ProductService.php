<?php

namespace App\UseCases\Products;

use Intervention\Image\ImageManagerStatic;

class ProductService
{
    private $sizes = [
        'xs' => 300,
        'sm' => 600,
        'md' => 900,
    ];

    public function storeProductImages($files) {
        foreach($files as $file)
        {
            $imageManager = ImageManagerStatic::make($file->getRealPath());
            $imageManager->save(storage_path('app/products/').$file->getClientOriginalName());
            
            foreach($this->sizes as $key => $size)
            {
                $imageManager->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/products/').$key.'_'.$file->getClientOriginalName());
            }
            // ImageManagerStatic::make($file->getRealPath())
            // ->save(storage_path('app/products/').$file->getClientOriginalName())
            // ->resize(300)
            // ->save(storage_path('app/products/').'small_'.$file->getClientOriginalName());
        }
    }
    
    public function getProductImagesData($files)
    {
        foreach($files as $file)
        {
            $images[] = [
                'name' => $file->getClientOriginalName(),
                'alt'  => $file->getClientOriginalName(),
                'primary' => false,
            ];
        }
        return $images;
    }
}
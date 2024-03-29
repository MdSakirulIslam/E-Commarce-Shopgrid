<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    private static $productImage,$productImages,$image,$imageName,$imageUrl,$extension,$derectory;

    private static function getImageUrl($image)
    {
        self::$extension            =  $image->getClientOriginalExtension();
        self::$imageName            =  rand(10000,500000).'.'.self::$extension;
        self::$derectory            =  'uploads/product-other-images/';
        $image                ->move(self::$derectory,self::$imageName);
        self::$imageUrl             =  self::$derectory.self::$imageName;
        return self::$imageUrl;
    }


    public static function newProductImage($productId,$images)
    {
        foreach ($images as $image)
        {
            self::$imageUrl = self::getImageUrl($image);
            self::$productImage = new ProductImage();
            self::$productImage->product_id = $productId;
            self::$productImage->image   = self::$imageUrl;
            self::$productImage->save();

        }
    }
    public static function updateProductImage($id,$images)
    {
       self::deleteProductImage($id);
        self::newProductImage($id,$images);
    }
    public static function deleteProductImage($id)
    {
        self::$productImages = ProductImage::where('product_id', $id)->get();
        foreach (self::$productImages as $productImage)
        {
            if (file_exists($productImage->image))
            {
                unlink($productImage->image);
            }
            $productImage->delete();
        }
    }

}

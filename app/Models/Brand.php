<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand,$image,$imageName,$imageUrl,$extension,$derectory;

    private static function getImageUrl($image)
    {
        self::$extension            =  $image->getClientOriginalExtension();
        self::$imageName            =  time().'.'.self::$extension;
        self::$derectory            =  'uploads/brand-images/';
        $image                ->move(self::$derectory,self::$imageName);
        self::$imageUrl             =  self::$derectory.self::$imageName;
        return self::$imageUrl;
    }


    public static function newBrand($request)
    {
            self::saveBasicInfo(new Brand(),$request,self::getImageUrl($request->file('image')));
    }


    public static function updateBrand($request,$id)
    {
        self::$brand = Brand::find($id);
        if (self::$image = $request->file('image'))
        {
            self::deleteImageFromFolder(self::$brand->image);
            self::$imageUrl  = self::getImageUrl($request->file('image'));
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }
        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);
    }


    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        self::deleteImageFromFolder(self::$brand->image);
        self::$brand->delete();
    }


    private static function saveBasicInfo($brand,$request,$imageUrl)
    {
        $brand->name                   = $request->name;
        $brand->description            = $request->description;
        $brand->image                   = $imageUrl;
        $brand->status                   = $request->status;
        $brand->save();
    }


    private static function deleteImageFromFolder($imageUrl)
    {
        if (file_exists($imageUrl))
        {
            unlink($imageUrl);
        }
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category,$image,$imageName,$imageUrl,$extension,$derectory;

    public static function newCategory($request)
    {
        self::$image                =  $request->file('image');
        self::$extension            =  self::$image->getClientClientOriginalExtension();
        self::$imageName            =  time().'.'.self::$extension;
        self::$derectory            =  'uploads/category-images/';
        self::$image                =  move(self::$derectory,self::$imageName);
        self::$imageUrl             =  self::$derectory.self::$imageName;


        self::$category = new Category();
        self::$category->name                   = $request->name;
        self::$category->description            = $request->description;
        self::$category->name                   = self::$imageUrl;
        self::$category->name                   = $request->status;
        self::$category->save();

    }
}

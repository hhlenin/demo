<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helper\ImageUpload;

class Category extends Model
{
    use HasFactory;
    private static $category;


    public static function storeCategory($request, $id = null)
    {
        if (!isset($id)) {
            self::$category = new Category();
        }
        elseif (isset($id)) {
            self::$category = Category::find($id);
        }
        self::$category->name           = $request->name;
        self::$category->description    = $request->description;
        if ( isset( $request->image )) {
            self::$category->image      = ImageUpload::getImageUrl($request, 'images/category-images/', self::$category->image);
        }
        self::$category->save();
    }


    public function subCategories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
}

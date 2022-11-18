<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helper\ImageUpload;

class Carousel extends Model
{
    use HasFactory;
    private static $category;

    public static function storeCarousel($request, $id = null)
    {
        if (!isset($id)) {
            self::$category = new Carousel();
        }
        elseif (isset($id)) {
            self::$category = Carousel::find($id);
        }
        self::$category->small_header           = $request->small_header;
        self::$category->h2_header    = $request->h2_header;
        self::$category->paragraph    = $request->paragraph;
        self::$category->price    = $request->price;
        if ( isset( $request->image )) {
            self::$category->image      = ImageUpload::getImageUrl($request, 'images/category-images/', self::$category->image);
        }
        else {
            self::$category->image = self::$category->image;
        }
        $request->has('link') ? self::$category->link = $request->input('link') : '';
        self::$category->save();
    }
}

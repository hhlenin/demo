<?php

namespace App\Models;

use App\Helper\ImageUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand;

    public static function storeBrand($request , $id = null)
    {
        if (!isset($id)) {
            self::$brand          = new Brand();
        }
        elseif (isset($id)) {
            self::$brand          = Brand::find($id);
        }
        self::$brand->name           = $request->name;
        self::$brand->description    = $request->description;
        if (isset($request->image)) {
            self::$brand->image      = ImageUpload::getImageUrl($request, 'images/brand-images/', self::$brand->image);            
        }
        self::$brand->save();
    }

}

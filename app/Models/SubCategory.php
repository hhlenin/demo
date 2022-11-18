<?php

namespace App\Models;

use App\Helper\ImageUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subCategory;

    public static function storeSubCategory($request, $id = null)
    {
        if (!isset($id)) {
            self::$subCategory          = new SubCategory();
        }
        elseif (isset($id)) {
            self::$subCategory          = SubCategory::find($id);
        }
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name        = $request->name;
        self::$subCategory->description = $request->description;
        if (isset($request->image)) {
            self::$subCategory->image   = ImageUpload::getImageUrl($request, 'images/sub-category-images/', self::$subCategory->image);           
        }
        self::$subCategory->save();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }
}

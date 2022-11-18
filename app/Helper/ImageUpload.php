<?php 

namespace App\Helper;
use Illuminate\Support\Str;

class ImageUpload
{
    private static $image;
    private static $imageName;
    private static $imageUrl;

    public static function getImageUrl($image, $directory, $db_image = null) 
    {
        self::$image = $image->file('image');
        if (isset($db_image))
        {
            if (file_exists($db_image))
            {
                unlink($db_image);
            }
        }
        self::$imageName = Str::random(10).time().'.'.self::$image->getClientOriginalExtension();
        self::$image->move($directory, self::$imageName);
        self::$imageUrl = $directory.self::$imageName;
        return self::$imageUrl;
    }
}
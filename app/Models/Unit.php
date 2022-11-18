<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    private static $unit;


    public static function storeUnit($request, $id = null)
    {
        if (!isset($id)) {
            self::$unit = new Unit();          
        }
        elseif (isset($id)) {
            self::$unit = Unit::find($id);
        }
        self::$unit->name           = $request->name;
        self::$unit->description    = $request->description;
        self::$unit->save();
    }

}

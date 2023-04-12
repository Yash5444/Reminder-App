<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class BaseModel extends Model
{
    /**
     * Added creating or updating event for created_by and updated_by fields
     */
    public static function boot()
    {
        parent::boot();
        // create a event to happen on creating
        static::creating(function ($record) {
            $record->created_by = request()->user() ? request()->user()->id : 0;
            $record->updated_by = request()->user() ? request()->user()->id : 0;
        });
        // create a event to happen on updating
        static::updating(function ($record) {
            $record->updated_by = request()->user() ? request()->user()->id : 0;
        });
    }
}
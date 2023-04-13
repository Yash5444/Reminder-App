<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Reminder extends BaseModel
{
    use SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'date_time'
    ];

    protected $casts = [
        'date_time' => 'datetime:d-m-Y H:i a'
    ];
}

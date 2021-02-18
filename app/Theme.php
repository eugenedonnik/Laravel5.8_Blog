<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Theme extends Model
{
    use Notifiable;
    //
    protected $fillable = [
        'name', 'body',
    ];
    protected $table = 'themes';
}

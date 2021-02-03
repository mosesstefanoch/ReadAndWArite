<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationary extends Model
{
    protected $table = 'stationaries';
    protected $fillable = ['name', 'type', 'stock', 'price', 'description', 'image' ];
}

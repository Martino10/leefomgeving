<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luchtvochtigheid extends Model
{
    use HasFactory;
    protected $table = 'luchtvochtigheid';

    public function location() {
        return $this->belongsTo('App\Locations', 'id');
    }
}

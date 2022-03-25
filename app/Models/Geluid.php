<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geluid extends Model
{
    use HasFactory;
    protected $table = 'geluid';

    public function location() {
        return $this->belongsTo('App\Locations', 'id');
    }
}

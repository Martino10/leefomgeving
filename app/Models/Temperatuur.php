<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperatuur extends Model
{
    use HasFactory;
    protected $table = 'temperatuur';

    public function location() {
        return $this->belongsTo('App\Locations', 'id');
    }
}

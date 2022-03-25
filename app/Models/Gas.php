<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    use HasFactory;
    protected $table = 'gas';

    public function location() {
        return $this->belongsTo('App\Locations', 'id');
    }
}

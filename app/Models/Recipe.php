<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function ingredients() {
        return $this->hasMany(Ingredient::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

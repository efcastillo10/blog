<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // para que en la url no aparezca el id del elemento a edit
    public function  getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos
    public function posts() {
        return $this->hasMany(Post::class);
    }
}


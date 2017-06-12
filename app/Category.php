<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];

    /**
     * Sebuah kategori memiliki banyak postingan
     * @return [type] [description]
     */
    public function posts(){
      return $this->hasMany('App\Post');
    }
}

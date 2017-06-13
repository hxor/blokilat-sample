<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'date', 'title', 'body', 'status', 'image'];

    protected $dates = [
        'date',
        'created_at',
        'updated_at'
    ];

    /**
     * Sebuah Post data dimiliki satu user
     * @return [type] [description]
     */
    public function user(){
      return $this->belongsTo('App\User');
    }

    /**
     * Sebuah Post data dimiliki satu category
     * @return [type] [description]
     */
    public function category(){
      return $this->belongsTo('App\Category');
    }
}

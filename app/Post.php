<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // table name Change
    protected $table = 'posts';
    // primary Key Change
    public $primaryKey = 'id';
    // Timestamps
   public $timestamps = true;

   public function user(){
       return $this->belongsTo('App\User');
   }


}

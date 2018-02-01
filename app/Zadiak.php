<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zadiak extends Model
{
    //
    protected $fillable = ['id','name', 'image'];
     public function contents() {
        return $this->hasMany('\App\Content');
    }
}

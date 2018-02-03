<?php

namespace App;
use App\Zadiak;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    public $timestamps = false;
    protected $fillable=['zadiak'];

    public function zadiak() {
        return $this->hasOne('\App\Zadiak');
    }
}

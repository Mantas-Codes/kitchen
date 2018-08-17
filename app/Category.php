<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];
    protected $dates = ['deleted_at'];

    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }
}

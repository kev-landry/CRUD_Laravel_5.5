<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Departement extends Model
{
    protected $fillable = [
        'departement_name',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Departement;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'user_email','user_statut','user_password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function departement()
    {
        return $this->belongsTo('App\Departement');
    }

    public function scopeSearchKeyword($query, $keyword)
    {

        //$departement = Departement::pluck('departement_name');
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("user_name", "LIKE","%$keyword%")
                    ->orWhere("user_email", "LIKE", "%$keyword%")
                    ->orWhereHas("departement", function($q) use ($keyword) {
                        $q->where('departement_name', "LIKE", "%$keyword%");
                });
            });
        }
        return $query;
    }
}

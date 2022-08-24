<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function members(){
        return $this->belongsToMany('App\Models\User')
                        ->withPivot('request_message','matching_flg');
    }
}

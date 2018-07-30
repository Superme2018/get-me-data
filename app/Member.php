<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function messages(){
        return $this->hasMany('App\MemberMessage');
    }
}

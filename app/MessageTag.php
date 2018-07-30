<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageTag extends Model
{
    public function hasTag($tag){

        if(count($this->where("tag", $tag)->get()))
            return true;
        return false;

    }
}

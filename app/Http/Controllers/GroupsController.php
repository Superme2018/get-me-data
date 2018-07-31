<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Member;
use App\MemberMessage;

class GroupsController extends Controller
{

    /*
    *
    *  Nested query filters.
    *
    *  This is a very early work in progress.
    *
    */
    public function getGroup(Group $group, $filter){

        // return $group->with('members')->with('members.messages')->with('members.messages.tags')->get();

        // Will return groups, messages and tags with members that have a specific tag.
        return $group->with('members')->with('members.messages')->whereHas('members.messages.tags', function($tags) use ($filter){
            $tags->where("tag", $filter);
        })->with('members.messages.tags')->get();


        // Will return groups, messages and tags for members that are flagged as active.
        return $group->with('members')->whereHas('members.messages', function($messages){
            $messages->where("active", true);
        })->with('members.messages.tags')->get();

    }

}

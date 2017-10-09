<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;
class GroupAssignController extends Controller
{
    //
    public function index(Group $group)
    {
        //

        $groupuser = $group->Users();
        $users = User::all();
        $keys = ['id','name','email'];
        $controller = 'GroupAssignController';
        $back_action = action('GroupController@index');
        return view('gen.group.group_users',compact('groupuser','group','users','keys','controller','back_action'));
    }
    public function attach(Group $group,User $user)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        $group->Users()->attach($user->id);
       return redirect('group/'.$group->id.'/add/')->with('success','User has been added');
    }
    public function detach(Group $group,User $user)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        //redirect('task')
        $group->Users()->newPivotStatementForId($user->id)->delete();
       return redirect('group/'.$group->id.'/add/')->with('success','User has been removed');
    }
}

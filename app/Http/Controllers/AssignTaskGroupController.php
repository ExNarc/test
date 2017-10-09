<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\AssignTask;
use App\Group;

class AssignTaskGroupController extends Controller
{
	public function index(AssignTask $assignTask)
    {
        //
        $task = $assignTask->Task;
        $assignTaskgroups = $assignTask->Groups()->get()->pluck('id')->toArray();
        $groups = Group::all();
        $keys = ['id','groupname'];
        $controller = 'AssignTaskGroupController';
        $backcon = 'AssignTaskController';
        return view('gen.assigntask.assigntaskgroup',compact('task','groups','assignTaskgroups','keys','controller','backcon', 'assignTask'));
    }
    public function attach(AssignTask $assignTask,Group $group)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        $assignTask->Groups()->attach($group->id);
       return back()->with('success','Group has been added');
    }
    public function detach(AssignTask $assignTask,Group $group)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        //redirect('task')
        $assignTask->Groups()->newPivotStatementForId($group->id)->delete();
       return redirect('assigntask/'.$assignTask->id.'/add')->with('success','Group has been removed');
    }
}
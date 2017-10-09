<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Item;

class TaskItemController extends Controller
{
	public function index(Task $task)
    {
        //

        $taskitems = $task->items()->get()->pluck('id')->toArray();
        $items = Item::all();
        $keys = ['id','name','type'];
        $controller = 'TaskItemController';
        $backcon = 'TaskController';
        return view('gen.task.taskitem',compact('task','items','taskitems','keys','controller','backcon'));
    }
    public function attach(Task $task,Item $item)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        $task->Items()->attach($item->id);
       return back()->with('success','Question has been added');
    }
    public function detach(Task $task,Item $item)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        //redirect('task')
        $task->Items()->newPivotStatementForId($item->id)->delete();
       return redirect('task/'.$task->id)->with('success','Question has been removed');
    }
}

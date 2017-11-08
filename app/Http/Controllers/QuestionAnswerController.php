<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Question;
use App\Answer;

class QuestionAnswerController extends Controller
{
    //
    public function index(Item $item)
    {
        //

        $taskitems = $task->items()->get()->pluck('id')->toArray();
        $item = Item::all();
        $keys = ['id','name','type'];
        $controller = 'TaskItemController';
        $backcon = 'TaskController';
        return view('gen.item.taskitem',compact('task','items','taskitems','keys','controller','backcon'));


        $att = ['name','category'];
        $controller = 'QuestionAnswerController';
        //return compact('task','items','att');
        return view('gen.item.create',compact('att','controller'));
    }
    public function store(Request $request)
    {
        //
        $answer = $this->validate(request(), [
          'name' => 'required',
          'correct' => 'nullable',
        ]);
        
        Answer::create($answer);

        return redirect('item')->with('success', 'Answer has been add');
    }
    public function attach(Item $item,Answer $answer)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        $item->Question()->get()->attach($answer->id);
       return back()->with('success','Item has been added');
    }
    public function detach(Item $item,Answer $answer)
    {
        //$user->AccountRoles()->newPivotStatementForId($role->id)->whereAccountId($account->id)->delete();
        //redirect('task')
        //$task->Items()->newPivotStatementForId($item->id)->delete();
        $answer->delete();
       return redirect('item/'.$item->id)->with('success','Answer has been removed');
    }
}

<?php

namespace App\Http\Controllers;

use App\AssignTask;
use App\Task;
use Illuminate\Http\Request;

class AssignTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        //$comments = App\Post::find(1)->comments;
        $assignTasks = $task->AssignTasks;
        $lists = $assignTasks;
        //return $task;
        $keys = ['id','mark','open','end'];
        $controller = 'AssignTaskController';
        return view('gen.assigntask.index', compact('lists','keys','controller', 'task'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        //
        $att = ['mark','open', 'end'];
        $controller = 'AssignTaskController';
        //return $task;
        return view('gen.assigntask.create', compact('att','controller', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        //
        $assigntask = $this->validate(request(), [
          'mark' => 'required|numeric',
          'open' => 'required|date_format:"Y-m-d H:i:s"',
          'end' => 'required|date_format:"Y-m-d H:i:s"',
        ]);
        $assigntask['task_id'] = $task['id'];
        //return $assigntask;
        AssignTask::create($assigntask);
        $att = ['mark','open', 'end'];
        $controller = 'AssignTaskController';
        //return $task;
        //return view('gen.assigntask.create', compact('att','controller', 'task'));
        return back()->with('success', 'AssignTask has been Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        //$assignTask = AssignTask::find($id);
        //return $assignTask;

       // $assignTasks = $task->AssignTasks;
        //$lists = $assignTasks;
        //return $task;
        //$keys = ['id','mark','open','end'];
        //$controller = 'AssignTaskController';
        //return view('gen.assigntask.index', compact('lists','keys','controller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignTask $assignTask)
    {
        //
        $task = $assignTask->Task;
        $att = ['mark','open', 'end'];
        $controller = 'AssignTaskController';
        $target = $assignTask;
        //return $target;
        //return compact('task','items','att');
        return view('gen.assigntask.edit',compact('task', 'target','att','controller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignTask $assignTask)
    {
        //
         $task = $assignTask->Task;
         $this->validate(request(), [
          'mark' => 'required|numeric',
          'open' => 'required|date_format:"Y-m-d H:i:s"',
          'end' => 'required|date_format:"Y-m-d H:i:s"',
        ]);
        //return back()->with('success','Task has been updated');
        $assignTask->mark = $request->get('mark');
        $assignTask->open = $request->get('open');
        $assignTask->end = $request->get('end');
        $assignTask->save();
        return redirect('task/'.$task->id.'/assigntask')->with('success','AssignTask has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssignTask  $assignTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignTask $assignTask)
    {
        //
        $task = $assignTask->Task;
        $assignTask->delete();
        return redirect('task/'.$task->id.'/assigntask')->with('success','AssignTask has been deleted');
    }
}

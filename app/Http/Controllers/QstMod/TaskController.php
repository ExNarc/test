<?php

namespace App\Http\Controllers;

use App\Task;
use App\Clain;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clain $clain)
    {
        //
        $task = Task::all();
        if(isset($clain['id']))
            $task = $clain->Tasks()->get();
        $lists = $task;
        $keys = ['id','name','category'];
        $controller = 'TaskController';
        return view('gen.task.index',compact('lists','keys','controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $att = ['name','category'];
        $controller = 'TaskController';
        //return compact('task','items','att');
        return view('gen.task.create',compact('att','controller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task = $this->validate(request(), [
          'name' => 'required',
          'category' => 'nullable'
        ]);
        
        Task::create($task);

        return redirect('task')->with('success', 'Task has been Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        $items = $task->Items()->get();
        $keys = ['id','name','type'];
        $controller = 'ItemController';
        $conncon ='TaskItemController';
        $lists = $items;
        //return compact('task','items','att');
        return view('gen.task.show',compact('task','lists','keys','controller','conncon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        $items = $task->Items()->get();
        $att = ['name','category'];
        $controller = 'TaskController';
        $target = $task;
        //return compact('task','items','att');
        return view('gen.task.edit',compact('target','items','att','controller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $this->validate(request(), [
          'name' => 'required',
          'category' => 'required'
        ]);
        $task->name = $request->get('name');
        $task->category = $request->get('category');
        $task->save();
        return redirect('task')->with('success','Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return redirect('task')->with('success','Task has been deleted');
    }
}

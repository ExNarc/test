<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::all()->toArray();
        $lists = $groups;
        $keys = ['id','groupname'];
        $controller = 'GroupController';
        return view('gen.group.index', compact('lists','keys','controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $att = ['groupname'];
        $controller = 'GroupController';
        //User::all()->toArray();
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
        $group = $this->validate(request(), [
          'groupname' => 'required'
        ]);
        
        Group::create($group);

        return redirect('group')->with('success', 'Group has been Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
        $group = Group::find($group)[0];
        //return compact('product','id');
        //return view('gen.group.edit',compact('group'));

        //$items = $task->Items()->get();
        $att = ['groupname'];
        $controller = 'GroupController';
        //return compact('task','items','att');
        //return $group;
        return view('gen.group.edit',compact('group','att','controller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
        $this->validate(request(), [
          'groupname' => 'required',
        ]);
        $group->groupname = $request->get('groupname');
        $group->save();
        return redirect('group')->with('success','Group has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
        $group->delete();
        return redirect('group')->with('success','Group has been deleted');
    }
}

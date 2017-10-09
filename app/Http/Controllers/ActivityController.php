<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = Activity::all()->toArray();
        return view('activities.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = [
        'activityname'=>'required',
        'topic'=>'nullable'
        ];
        
        return view('activities.create',compact('question'));
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
        $activity = $this->validate(request(), [
          'activityname' => 'required',
          'topic' => 'nullable'
        ]);
        
        Activity::create($activity);

        return back()->with('success', 'Activity has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
        //$activity = Activity::find($id);
        //$id = $activity['id'];
        return view('activities.edit',compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
        $this->validate(request(), [
          //'' => 'required',
          //'' => 'required'
        ]);
        $activity->activityname = $request->get('activityname');
        $activity->topic = $request->get('topic');
        $activity->save();
        return redirect('activity')->with('success','Activity has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
        $activity->delete();
        return redirect('activity')->with('success','Activity has been deleted');
    }
}
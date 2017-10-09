<?php

namespace App\Http\Controllers;

use App\Question;
use App\Activity;
use Illuminate\Http\Request;

class ActQstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $Activity)
    {
        //
        //$questions = Question::all()->toArray();
        //return $questions = $Activity->Questions()->get();
        //return view('questions.index',compact('questions'));
        //$Activity->Questions()->get();
        //return view('questions.index',compact('Activity'));
        $questions = $Activity->Questions()->get();
        //$activityId = $Activity->id()->get();
        return view('questions.index',compact('questions', 'Activity'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $Activity)
    {
        //
        $question = [
        'question'=>'required',
        'answer'=>'required'
        ];
        return view('questions.create',compact('question', 'Activity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Activity $Activity)
    {
        
        $question = $this->validate(request(), [
          'question' => 'required',
          'answer' => 'required'
        ]);
        
        $question_tmp = Question::create($question);
        
        $question_tmp->Activities()->attach(Activity::find($Activity));

        //Question::find($question)->Activities()->attach(App\Activity::find($Activity));

        return back()->with('success', 'Question has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $Activity, Question $question)
    {
        //
        //$question = Question::find($id);
        //$id = $question['id'];
        //return compact('question');
        //return view('questions.edit',compact('question'));
        $questions = $Activity->Questions()->get();
        return view('questions.edit',compact('question', 'Activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $Activity, Question $question)
    {
        //
        $this->validate(request(), [
          'question' => 'required',
          'answer' => 'required'
        ]);
        $question->question = $request->get('question');
        $question->answer = $request->get('answer');
        $question->save();
        return redirect()
            ->action('ActQstController@index', [$Activity])
            ->with('success','Question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $Activity, Question $question)
    {
        //
        $question->delete();
        return redirect()
            ->action('ActQstController@index', [$Activity])
            ->with('success','Question has been delete');
    }
}

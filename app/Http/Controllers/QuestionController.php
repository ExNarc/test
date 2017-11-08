<?php

namespace App\Http\Controllers;

use App\Question;
use App\Activity;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return $Activity->Questions()->get();
        $questions = Question::all()->toArray();
        return view('questions.index',compact('questions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question = [
        'question'=>'required',
        'answer'=>'required'
        ];
        return view('questions.create',compact('question'));
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
        $question = $this->validate(request(), [
          'question' => 'required',
          'answer' => 'required'
        ]);
        
        Question::create($question);

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
        return $question->Answers()->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        //$question = Question::find($id);
        //$id = $question['id'];
        //return compact('question');
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
        $this->validate(request(), [
          'question' => 'required',
          'answer' => 'required'
        ]);
        $question->question = $request->get('question');
        $question->answer = $request->get('answer');
        $question->save();
        return redirect('question')->with('success','Question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        $question->delete();
        return redirect('questions')->with('success','Question has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Item;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Item $item)
    {
        //
        return view('answer.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {
        //
        $answer = $this->validate(request(), [
          'answer' => 'required',
        ]);
        if($request->get('correct')== "on")
            $correct = true;
        else
            $correct = false;
        $question = Question::find(
             $item->Question()->get()->pluck('id')[0]
        );
        $answer = Answer::create([
            'answer' => $answer['answer'],
            'question_id' => $question['id'],
            'correct' => $correct,
        ]);
        //$item->Question()->get()->add($answer);
        //$item->Question()->get()->attach($answer->id);
        return back()->with('success', 'Answer has been added');//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
        //$answer = Answer::find($answer['id']);
        //return compact('product','id');
        return view('answer.edit',compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
        //$answer = Answer::find($answer['id']);
        $this->validate(request(), [
          'answer' => 'required',
        ]);
        $answer->answer = $request->get('answer');
        if($request->get('correct')== "on")
            $correct = true;
        else
            $correct = false;
        $answer->correct = $correct;
        $answer->save();
        return redirect('item')->with('success','Answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //$answer = Answer::find($answer['id']);
        $answer->delete();
        return back()->with('success', 'Answer has been deleted');
    }
}

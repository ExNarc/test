<?php

namespace App\Http\Controllers;

use App\Item;
use App\Task;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task)
    {
        //
        if(isset($task['id']))
            $items = $task->Items()->get();
        else
            $items = Item::all();
        $lists = $items;
        foreach ($lists as $list){
          $list['question'] = Question::find(
            $list->Question()->get()->pluck('id')[0]
          );
          $list['answers'] = $list['question']->Answers()->get();
        }
        //return $lists;
        $keys = ['id','name','type'];
        $controller = 'ItemController';
        return view('gen.item.index',compact('lists','keys','controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $att = ['name', 'question','type', 'target', ];
        $controller = 'ItemController';
        return view('gen.item.create', compact('controller', 'att'));

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
        $item = $this->validate(request(), [
          'question' => 'required',
          'type' => 'required',
          'target' => 'required',
          'name' => 'required',
        ]);
        //return $request->get('answers');
        $question = Question::create([
            'question' => $item['question'],
            'suspend' => 0,
        ]);

        $item = Item::create([
            'name' => $item['name'],
            'type' => $item['type'],
            'target' => $item['target'],
            'question_id' => $question['id'],
        ]);
        if ($request->get('answers')!=null){
            $answers = $request->get('answers');
            $answers = $answers['newAnswer'];
            //return $answers;
            //return $question['id'];
            $i = 0;
            foreach ($answers as $answer) {
                $answer = Answer::create([
                'answer' => $answer,
                ]);
                $question->Answers()->save($answer);
                $newAnswer[$i++] = $answer;
            }
            $i = 0;
            $answers = $request->get('answers');
            $answers = $answers['newCorrect'];
            foreach ($answers as $answer) {
                $newAnswer[$i]->correct = $answer;
                $newAnswer[$i++]->save();
            }
            //return $newAnswer;
        }
        //$item->Question()->get()->add($answer);
        //$item->Question()->get()->attach($answer->id);
        return back()->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        $question = Question::find(
        $item->Question()->get()->pluck('id')[0]
        );//->pluck('id')
        $answers = $question->Answers()->get();
        //$answers = $question;
        //$answers = $question->Answers()->get();
        //return compact('item','question','answers');
        $keys = ['id','answer','correct'];
        $controller = 'ItemController';
        $conncon ='AnswerController';
        $lists = $answers;
        //return compact('task','items','att');
        return view('gen.item.show',compact('item','lists','question','keys','controller','conncon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $question = Question::find(
        $item->Question()->get()->pluck('id')[0]
        );//->pluck('id')
        $answers = $question->Answers()->get();
        //return compact('product','id');
        $att = ['name', 'type', 'target', ];
        return view('gen.item.edit',compact('item','question', 'answers','att' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $this->validate(request(), [
          'name' => 'required',
          'type' => 'required',
          'target' => 'required',
          'question' => 'required',
        ]);
        //return $request;

        $question = Question::find(
        $item->Question()->get()->pluck('id')[0]
        );//->pluck('id')
        $answers = $question->Answers()->get();

        $item->name = $request->get('name');
        $item->type = $request->get('type');
        $item->target = $request->get('target');
        $item->save();

        $question-> question = $request->get('question');
        $question->save();

        if($request->get('answers') != null) {
            $editAnswers = $request->get('answers');
            //return $editAnswers;

            $editAnswers = $editAnswers['answer'];
            //return $editAnswers;
            $max = 0;
            foreach ($answers as $answer) {
              $max++;
            }
            $i = 0;
            foreach ($editAnswers as $answer) {
                $answers[$i]->answer = $answer;
                $answers[$i++]->save();
            };
              while ($max>$i) {
                //return $answers[$i];
                $answers[$i++]->delete();
              }
           

            $editAnswers = $request->get('answers');
            $editAnswers = $editAnswers['correct'];
            //return $editAnswers;
            $i = 0;
            foreach ($editAnswers as $answer) {
                $answers[$i]->correct = $answer;
                $answers[$i++]->save();
            }

            $answers = $request->get('answers');
            if(isset($answers['newAnswer'])){
              $answers = $answers['newAnswer'];
              //return $answers;
              //return $question['id'];
              $i = 0;
              foreach ($answers as $answer) {
                  $answer = Answer::create([
                  'answer' => $answer,
                  ]);
                  $question->Answers()->save($answer);
                  $newAnswer[$i++] = $answer;
              }
              $i = 0;
              $answers = $request->get('answers');
              $answers = $answers['newCorrect'];
              foreach ($answers as $answer) {
                  $newAnswer[$i]->correct = $answer;
                  $newAnswer[$i++]->save();
              }
            }
        } else {
          foreach ($answers as $answer) {
              $answer->delete();
            }
        }
        return redirect('item')->with('success','Answer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        return redirect('item')->with('success','Item has been deleted');
    }
}

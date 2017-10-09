<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Rule;
use App\Level;
class RuleItemController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $item)
    {
        //
        $rules = Rule::all();
        if (isset($item->id))
            $rules = $item->rules;
        $lists = $rules;
        $keys = ['id','name', 'desc','level_id'];
        $controller = 'RuleItemController';
        return view('gen.rule.index', compact('item','lists','keys','controller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Item $item)
    {
        //
        //return $item;
        $att = ['name', 'desc','level_id'];
        $controller = 'RuleItemController';
        $level = Level::all();
        //User::all()->toArray();
        //return compact('rule','att');
        return view('gen.rule.create',compact('att','controller','item','level'));
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
        //return $request;
        //return compact('request','item');
        $rule = $this->validate(request(), [
          'name' => 'required',
          'desc' => 'required',
          'level_id' => 'required'
        ]);
        $rule['item_id'] = $item->id;
        Rule::create($rule);

        return back()->with('success', 'Rule has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function show(Rule $rule)
    {
        //
        /*
        $keys =  ['name', 'desc','level_id'];
        $controller = 'RuleItemController';
        $conncon ='RuleItemController';
        $lists = $rule;
        //return compact('task','items','att');
        return view('gen.rule.show',compact('rule','lists','keys','controller','conncon'));
        return $rule;
        return $item->rules;
        $level = Level::all();
        return compact('item','rule','level');
*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function edit(Rule $rule)
    {
        //
        $att = ['name', 'desc','level_id'];
        $controller = 'RuleItemController';
        $level = Level::all();
        //return compact('task','items','att');
        //return $group;
        return view('gen.rule.edit',compact('rule','att','controller','level'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rule $rule)
    {
        //
        $rule = $this->validate(request(), [
          'name' => 'required',
          'desc' => 'required',
          'level_id' => 'required'
        ]);
        $rule['item_id'] = $item->id;
        Rule::create($rule);
        $this->validate(request(), [
          'groupname' => 'required',
        ]);
        $group->groupname = $request->get('groupname');
        $group->save();
        return back()->with('success', 'Rule has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rule  $rule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rule $rule)
    {
        //
    }
}

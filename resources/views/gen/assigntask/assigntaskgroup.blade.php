<!-- taskitem.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">

<div id="msgbox">
	@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
          </div><br />
      @endif      
  </div>
<a href="{{action($backcon . '@index',$task->id)}}" class="btn btn-warning">back</a>
    <table class="table table-striped">

      <tr>
      @foreach($keys as $key => $value)
        <th>{{$value}}</th>
      @endforeach
      @if( isset($controller) )
        <th colspan="1">Action</th>

        @endif
      </tr>
      @foreach($groups as $key => $group)
      <tr>
      @foreach($keys as $key => $value)
        <td>{{$group[$value]}}</td>
      @endforeach
      @if( isset($controller) )
        <td>

      @if( in_array($group->id, $assignTaskgroups) )
      <form action="{{action($controller . '@detach',[$assignTask->id,$group->id])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Remove</button>
          </form>
      @else
          <a href="{{action($controller . '@attach',[$assignTask->id,$group->id])}}" class="btn btn-warning">Add</a>
      @endif
        </td>
        @endif
      </tr>
      @endforeach
</table>

  </div>
@endsection
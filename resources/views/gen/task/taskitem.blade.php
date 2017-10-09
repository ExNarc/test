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
      @endif      
  </div><br />
  </div>
<a href="{{action($backcon . '@s'.'how',$task->id)}}" class="btn btn-warning">back</a>
    <table class="table table-striped">

      <tr>
      @foreach($keys as $key => $value)
        <th>{{$value}}</th>
      @endforeach
      @if( isset($controller) )
        <th colspan="1">Action</th>

        @endif
      </tr>
      @foreach($items as $key => $item)
      <tr>
      @foreach($keys as $key => $value)
        <td>{{$item[$value]}}</td>
      @endforeach
      @if( isset($controller) )
        <td>

      @if( in_array($item->id, $taskitems) )
          Added
      @else
          <a href="{{action($controller . '@attach',[$task->id,$item->id])}}" class="btn btn-warning">Add</a>
      @endif
        </td>
        @endif
      </tr>
      @endforeach
</table>

  </div>
@endsection
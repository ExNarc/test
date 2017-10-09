<!-- list.blade.php -->

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
      </div>
      @endif      
  <br />
  </div>
<a href="{{action(($conncon . '@index'),$task->id)}}" class="btn btn-warning">Add</a>
    <table class="table table-striped">

      <tr>
      @foreach($keys as $key => $value)
        <th>{{$value}}</th>
      @endforeach
      @if( isset($controller) )
        <th colspan="1">Action</th>

        @endif
      </tr>
      @foreach($lists as $key => $row)
      <tr>
      @foreach($keys as $key => $value)
        <td>{{$row[$value]}}</td>
      @endforeach
      @if( isset($controller) )
        <td>
          <form action="{{action($conncon . '@detach',[$task['id'],$row['id']])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Remove</button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
</table>

  </div>
@endsection
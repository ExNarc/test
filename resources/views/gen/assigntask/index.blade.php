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

    <table class="table table-striped">

      <tr>
      @foreach($keys as $key => $value)
        <th>{{$value}}</th>
      @endforeach
      @if( isset($controller) )
        <th colspan="1">Action</th>
         <th colspan="2"><a href="{{action(('AssignTaskController' . '@create'),$task['id'])}}" class="btn btn-warning">Add</a></th>

        @endif
      </tr>
      @foreach($lists as $key => $row)
      <tr>
      @foreach($keys as $key => $value)
        <td>{{$row[$value]}}</td>
      @endforeach
      @if( isset($controller) )
        <td>
             <a href="{{action(($controller . '@edit'),$row['id'])}}" class="btn btn-warning">Edit</a>
        </td>
        <td>
          <form action="{{action($controller . '@destroy',$row['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        @endif
        <td><a href="{{action(('AssignTaskGroupController' . '@index'),$row['id'])}}" class="btn btn-warning">Assign to group</a></td>
      </tr>
      @endforeach
</table>

  </div>
@endsection
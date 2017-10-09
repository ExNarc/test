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
         <th colspan="1">
        @if (isset($item->id))
          <a href="{{action(($controller . '@create'),$item->id)}}" class="btn btn-warning">Add</a>
          @endif
        </th>

        @endif
      </tr>
      @foreach($lists as $key => $row)
      <tr>
      @foreach($keys as $key => $value)
        <td>{{$row[$value]}}</td>
      @endforeach
      @if( isset($controller) )
        <td>
        	
       <?php// <a href="action(($controller . '@s'.'how'),$row['id'])}}" class="btn btn-warning"Show</a>
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
      </tr>
      @endforeach
</table>

  </div>
@endsection
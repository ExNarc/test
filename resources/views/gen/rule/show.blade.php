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
<a href="{{action(($conncon . '@index'),$rule->item->id)}}" class="btn btn-warning">back</a>
    <table class="table table-striped">

      <tr>
      @foreach($keys as $key => $value)
        <th>{{$value}}</th>
      @endforeach
      @if( isset($controller) )
        <th colspan="1">Action</th>

        @endif
      </tr>
      {{$rule}}
      @foreach($lists as $key => $row)
      <tr>
        {{$row}}
      @foreach($keys as $key => $value)
        <td>{{$row[$value]}}</td>
      @endforeach
      </tr>
      @endforeach
</table>

  </div>
@endsection
<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit An AssignTask</div>

                <div class="panel-body">
                  @extends('gen.msgbox')
      
<form method="post" action="{{action(($controller . '@update'),$target['id'])}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
    @foreach ($att as $key)
      @if($key == "open" || $key == "end")
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text"  class="form-control" name="{{ $key }}" value="{{ ($target->$key) }}" placeholder="2001-01-01 01:00:00">
           </div>
        </div>
        @else
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" value="{{ ($target->$key) }}">
           </div>
        </div>
        @endif
    @endforeach
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action(('AssignTaskController' . '@index'),$task['id'])}}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

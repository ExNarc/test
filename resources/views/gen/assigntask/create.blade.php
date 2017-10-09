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
                <div class="panel-heading">Create A Task</div>

                <div class="panel-body">
                  @extends('gen.msgbox')
      
<form method="post" action="{{action(('AssignTaskController' . '@store'),$task['id'])}}" id="form">
        {{csrf_field()}}
    @foreach ($att as $key)
      @if($key == "open" || $key == "end")
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <!--<input type="datetime-local" class="form-control" name="{{ $key }}" value="" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>-->
            <!--<input type="hidden" name="{{ $key }}" value="">

            <input type="text"  name="{{ $key }}_year" value="" pattern="[0-9]{4}" maxlength="4" size="4" placeholder="yyyy"> - 
            <input type="text"  name="{{ $key }}_month" value="" pattern="[0-9]{2}" maxlength="2" size="2" placeholder="mm"> - 
            <input type="text"  name="{{ $key }}_day" value="" pattern="[0-9]{2}" maxlength="2" size="2" placeholder="dd">&nbsp;&nbsp;&nbsp;
            <input type="text" name="{{ $key }}_hour" value="" pattern="[0-9]{2}" maxlength="2" size="2" placeholder="hh"> :
            <input type="text"  name="{{ $key }}_minute" value="" pattern="[0-9]{2}" maxlength="2" size="2" placeholder="mm">
           </div>-->
           <input type="text"  class="form-control" name="{{ $key }}" value="" placeholder="2001-01-01 01:00:00">
          </div>
        </div>
      @else
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" value="">
           </div>
        </div>
      @endif
    @endforeach
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action(('AssignTaskController' . '@index'),$task['id'])}}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" style="margin-left:38px" id="setTime">Create</button>
          </div>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

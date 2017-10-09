<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create A Task</div>

                <div class="panel-body">
                  @extends('gen.msgbox')
      
<form method="post" action="{{action(($controller . '@store'))}}">
        {{csrf_field()}}
    @foreach ($att as $key)
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" value="">
           </div>
        </div>
    @endforeach
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action(($controller . '@index'))}}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Create</button>
          </div>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

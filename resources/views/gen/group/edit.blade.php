<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit A Question</div>

                <div class="panel-body">
                  @extends('gen.msgbox')
      
<form method="post" action="{{action(($controller . '@update'),$group['id'])}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
    @foreach ($att as $key)
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" value="{{ ($group->$key) }}">
           </div>
        </div>
    @endforeach
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action(($controller . '@index'))}}" class="btn btn-warning">Back</a>
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

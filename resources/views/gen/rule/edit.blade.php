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
      
<form method="post" action="{{action(($controller . '@update'),$rule['id'])}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
    @foreach ($att as $key)
    @if ($key!='level_id')
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" value="{{ ($rule->$key) }}">
           </div>
        </div>
    @endif
    @endforeach
         <div class="row">
          <div class="form-group col-md-8">
            <label for="level_id">level:</label>

            <select class="form-control" name="level_id" value="1" required>
    @foreach ($level as $key => $value)
              <option value="{{$value->id}}">{{$value->id}}-{{ $value->desc }} </option>
    @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action(($controller . '@index'),$rule->item->id)}}" class="btn btn-warning">Back</a>
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

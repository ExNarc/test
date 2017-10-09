<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create A Rule</div>

                <div class="panel-body">
                  @extends('gen.msgbox')
      
<form method="post" action="{{action(($controller . '@store'),$item->id)}}">
        {{csrf_field()}}
    @foreach ($att as $key)
    @if ($key!='level_id')
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
            <label for="level_id">level:</label>

            <select class="form-control" name="level_id" value="1" required>
    @foreach ($level as $key => $value)
              <option value="{{$value->id}}">{{$value->id}}-{{ $value->desc }} </option>
    @endforeach
            </select>
          </div>
        </div>

        <div id="User"></div>
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action(($controller . '@index'),$item->id)}}" class="btn btn-warning">Back</a>
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

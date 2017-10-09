<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/function.js')}}"></script>
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
                <div class="panel-heading">Create A Item</div>

                <div class="panel-body">
                  @extends('gen.msgbox')
<form method="post" action="{{action(($controller . '@store'))}}">
        {{csrf_field()}}
    @foreach ($att as $key)
      @if($key=="type")
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <select name="{{ $key }}" class="form-control">
              <option value="MC">MC question</option>
              <option value="Long question">Long question</option>
              <option value="Short question">Short question</option>
            </select>
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
            <a id='addAnswer' class="btn btn-primary">Add Answer</a>
          </div>
        </div>
        <div id="Answer"></div>
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

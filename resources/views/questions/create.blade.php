<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create A Question</div>

                <div class="panel-body">
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
      <form method="post" action=
       @if (isset($Activity))
          {{action('ActQstController@store', $Activity['id'])}}
        @else
          {{url('questions')}}
        @endif
          >
        {{csrf_field()}}
		@foreach ($question as $key => $value)
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" required="{{ $value }}">
           </div>
        </div>
    @endforeach

        <div class="row">
           <div class="form-group col-md-8">
		    <a href="
        @if (isset($Activity))
          {{action('ActQstController@index', $Activity['id'])}}
        @else
          {{action('QuestionController@index')}}
        @endif
        " class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Add Question</button>
           </div>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

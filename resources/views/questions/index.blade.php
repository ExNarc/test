<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
   <a href=
         @if (isset($Activity))
            {{action('ActQstController@create', $Activity['id'])}}
        @else
            {{action('QuestionController@create')}}
        @endif
           class="btn btn-warning">Add Question</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Question</th>
        <th>Answer</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($questions as $question)
      <tr>
        <td>{{$question['id']}}</td>
        <td>{{$question['question']}}</td>
        <td>{{$question['answer']}}</td>
        <td><a href=
        @if (isset($Activity))
            {{action('ActQstController@edit',
            [ "activity" => $Activity['id'],
              "question" => $question['id']])}}
        @else
            {{action('QuestionController@edit', $question['id'])}}
        @endif
         class="btn btn-warning">Edit</a></td>
        <td>
          <form action=
          @if (isset($Activity))
            {{action('ActQstController@destroy',
            [ "activity" => $Activity['id'],
              "question" => $question['id']])}}
        @else
            {{action('QuestionController@destroy', $question['id'])}}
        @endif
           method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection

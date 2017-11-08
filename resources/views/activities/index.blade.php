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
   <a href="{{action('ActivityController@create')}}" class="btn btn-warning">Add Activity</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Activity Name</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($activities as $activity)
      <tr>
        <td>{{$activity['id']}}</td>
        <td>{{$activity['activityname']}}</td>
        <td><a href="{{action('ActivityController@edit', $activity['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('ActivityController@destroy', $activity['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        <td><a href="{{action('ActQstController@index', $activity['id'])}}" class="btn btn-warning">View Questions</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

@endsection

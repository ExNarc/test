<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create A Answer</div>

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
      <form method="post" action="{{action(('AnswerController' . '@store'),$item->id)}}">
        {{csrf_field()}}
        <div class="row">
           <div class="form-group col-md-8">
            <label for="answer">Answer:</label>
            <input type="text" class="form-control" name="answer" required>
           </div>
        </div>
        <div class="row">
           <div class="form-group col-md-8">
            <label for="correct">Correct:</label>
            <input type="checkbox" name="correct">
           </div>
        </div>

        <div class="row">
           <div class="form-group col-md-8">
            <a href="{{action('ItemController@show',$item['id'])}}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Add Answer</button>
           </div>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
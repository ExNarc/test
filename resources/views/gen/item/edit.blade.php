<!-- edit.blade.php -->
@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/function.js')}}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit A Item</div>

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
<form method="post" action="{{action('ItemController@update', $item['id'])}}">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        
   @foreach ($att as $key)
      @if($key=="type")
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <select name="{{ $key }}" class="form-control">
              <option value="MC"@if($item['type']=="MC") selected @endif>MC question</option>
              <option value="Long question" @if($item['type']=="Long question") selected @endif>Long question</option>
              <option value="Short question"@if($item['type']=="Short question") selected @endif>Short question</option>
            </select>
           </div>
        </div>
      @else
      
        <div class="row">
           <div class="form-group col-md-8">
            <label for="{{ $key }}">{{ ucwords($key) }}:</label>
            <input type="text" class="form-control" name="{{ $key }}" value="{{ ($item->$key)}}">
           </div>
        </div>
        @endif
    @endforeach

        <div class="row">
           <div class="form-group col-md-8">
            <label for="question">Question:</label>
            <input type="text" class="form-control" name="question" value="{{$question['question']}}">
           </div>
        </div>

        <?php $i=0?>
        @foreach ($answers as $answer)
        <div class="row">
           <div class="form-group col-md-8">
            <label for="answers[answer][]">Answer:</label>
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <input type="text" class="form-control" name="answers[answer][]" value="{{$answer['answer']}}">
            
            <label for="answers[correct][{{$i}}]">Corrrect:</label>
            <label class="radio-inline">
               <input name="answers[correct][{{$i}}]" value="1" required="" type="radio" @if($answer['correct']==1) checked @endif>True
            </label>
            <label class="radio-inline">
               <input name="answers[correct][{{$i++}}]" value="0" type="radio"@if($answer['correct']==0) checked @endif>False
            </label>
          </div>
        </div>        
        @endforeach
        <div class="row">
          <div class="form-group col-md-8">
            <a id='addAnswer' class="btn btn-primary">Add Answer</a>
          </div>
        </div>
        <div id="Answer"></div>
        <div class="row">
          <div class="form-group col-md-8">
        <a href="{{action('ItemController@index')}}" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update Question</button>
          </div>
        </div>
      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

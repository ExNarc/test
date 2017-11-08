<!-- list.blade.php -->

@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
    <h1>Item</h1>
@stop

@section('content')
<div class="container">

<div id="msgbox">
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
          </div>
      @endif      
  <br />
  </div>

    <table class="table table-striped">

      <tr>
      <?php $i=0?>
      @foreach($keys as $key => $value)
        <th>{{$value}}</th>
      @endforeach
      @if( isset($controller) )
        <th colspan="1">Action</th>
         <th colspan="1"><a href="{{action(($controller . '@create'))}}" class="btn btn-warning">Add</a></th>

        @endif
      </tr>
      @foreach($lists as $key => $row)
      <tr>
      @foreach($keys as $key => $value)
        <td>{{$row[$value]}}</td>
      @endforeach
      @if( isset($controller) )
        <td>
        <!--<a href="{{action(($controller . '@s'.'how'),$row['id'])}}" class="btn btn-warning">Show</a>-->
        <button data-toggle="collapse" data-target="#detail{{$i}}" class="btn btn-warning">Show</button>
             <a href="{{action(($controller . '@edit'),$row['id'])}}" class="btn btn-warning">Edit</a>
             <div id="detail{{$i++}}" class="collapse">
              Question : <?php echo strip_tags ($row['question']['question']);?> <br>
             @if(!empty($row['answers'][0]))
                Answer : <ul>
               @foreach($row['answers'] as $answer)
                @if($answer['correct'])
                  <li style="color:green;">
                   {{$answer['answer']}}
                  </li>
                @else
                  <li style="color:red;">
                   {{$answer['answer']}}
                  </li>
                @endif
               @endforeach
               </ul>
             @endif
            </div>
        </td>
        <td>
          <form action="{{action($controller . '@destroy',$row['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        @endif
        <td></td>
      </tr>
      @endforeach
</table>

  </div>
@stop
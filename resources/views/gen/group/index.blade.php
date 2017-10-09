<!-- list.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
<script type="text/javascript">
  $(document).ready(function(){
  $('.groupuser').hide();

  $('.showuser').click(function(){
        $(this).parent('td').children('.groupuser').toggle( "slow", function() {
    // Animation complete.
        });
  });
  });
</script>
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
        <td>{{$row['id']}}</td>
        <td>{{$row['groupname']}}
          <botton class="showuser btn btn-warning">show</botton>
          <table class ='groupuser' border = 1>
      @foreach($row->Users as $key => $user)
          <tr><td><a href="{{action('UserController@show',$user['id'])}}">{{$user->name}}</a></td></tr>
      @endforeach
        </table>
      </td>
      @if( isset($controller) )
        <td>
        
        <a href="{{action(('GroupAssignController@index'),$row['id'])}}" class="btn btn-warning">Assign</a>
             <a href="{{action(($controller . '@edit'),$row['id'])}}" class="btn btn-warning">Edit</a>
        </td>
        <td>
          <form action="{{action($controller . '@destroy',$row['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
</table>

  </div>
@endsection
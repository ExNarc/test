<!-- create.blade.php -->
@extends('adminlte::page')

@section('title', 'User Create')

@section('content_header')
    <h1>User Create</h1>
@stop

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create A User</div>
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
      <div class="panel-body">
        <form method="post" action="{{url('user')}}">
          {{csrf_field()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                     <span class="help-block">
                       <strong>{{ $errors->first('email') }}</strong>
                     </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                  <div class="col-md-6">
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>

                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                 <label for="email" class="col-md-4 control-label">Role:</label>
                 <div class="col-md-6">
                   <select name="role_id" class="form-control">
                     <option value="2">Student</option>
                     <option value="1">Admin</option>
                   </select>
                    @if ($errors->has('role_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('role_id') }}</strong>
                       </span>
                    @endif
                   </div>
                 </div>

                 <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                       <button type="submit" class="btn btn-primary">
                          Register
                       </button>
                    </div>
                </div>
            </div>
      </form>
    </div>

 @stop
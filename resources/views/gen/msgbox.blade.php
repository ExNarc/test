<!-- msgbox.blade.php -->
@section('msgbox')
<div class="alert alert-danger">
          <ul>
                  <li>123</li>
          </ul>
      </div>
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
@endsection
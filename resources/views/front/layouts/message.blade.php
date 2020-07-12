@if(count($errors->all()) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
       <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


{{-- check for session success --}}
@if(session('msg'))
  <div class="alert alert-success">
    {{session('msg')}}
  </div>
@endif

{{-- check for session error --}}
@if(session('error'))
  <div class="alert alert-danger">
    {{session('error')}}
  </div>
@endif




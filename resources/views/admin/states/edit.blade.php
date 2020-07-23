@extends('admin.index')

@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          {{-- @include('admin.layouts.message')  --}}

          <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            {!! Form::open(['route'=>['states.update',$state->id], 'method' =>'post']) !!}

            {!! Form::hidden('_method','put') !!}
            @include('admin.states.form')

            {!! Form::submit(trans('admin.save'), ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->


@endsection

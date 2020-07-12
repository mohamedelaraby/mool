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
            {!! Form::open(['route'=>['users.update',$user->id], 'method' =>'post']) !!}
            {!! Form::token() !!}
            {!! Form::hidden('_method','put') !!}
            
            {{-- name --}}
            <div class="form-group">
              {!! Form::label('name', trans('admin.name')) !!}
              {!! Form::text('name',$user->name,
                           [ 'class' =>'form-control',
                            // 'required' =>true,
                            'placeholder' =>trans('admin.name'),
                            'auto-focus'=>'true' ]) 
              !!}
            </div>
            
            {{-- Email --}}
            <div class="form-group">
              {!! Form::label('email', trans('admin.email')) !!}
              {!! Form::email('email',$user->email,
                           [ 'class' =>'form-control',
                            // 'required' =>true,
                            'placeholder' =>trans('admin.email'),
                            'auto-focus'=>'true' ]) 
              !!}
            </div>
            
            {{-- password --}}
            <div class="form-group">
              {!! Form::label('password', trans('admin.password')) !!}
              {!! Form::password('password',
                           [ 'class' =>'form-control',
                            // 'required' =>true,
                            'placeholder' =>trans('admin.password'),
                            'auto-focus'=>'true' ]) 
              !!}
            </div>

            
                 {{-- User Type --}}
                 <div class="form-group">
                  {!! Form::label('level', trans('admin.level')) !!}
                  {!! Form::select('level',
                                
                                // 'required' =>true,
                                ['user'=>trans('admin.user'),
                                  'vendor'=>trans('admin.vendor'),
                                  'company'=>trans('admin.company')
                                ],
                                  $user->level,
                                  ['class' =>'form-control',
                                'auto-focus'=>'true',
                                'placeholder' =>'................',
                                                         ]) 
                  !!}
                </div>

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
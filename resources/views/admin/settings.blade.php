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
            {!! Form::open(['url'=>admin_url('settings'),'files'=>true]) !!}
            {!! Form::token() !!}

            {{-- sitename_ar --}}
            <div class="form-group">
                {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
                {!! Form::text('sitename_ar',settings()->sitename_ar, ['class'=> 'form-control']) !!}
            </div>
            {{-- sitename_en --}}
            <div class="form-group">
                {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
                {!! Form::text('sitename_en',settings()->sitename_en, ['class'=> 'form-control']) !!}
            </div>

            {{-- email --}}
            <div class="form-group">
                {!! Form::label('email',trans('admin.settings-email')) !!}
                {!! Form::email('email',settings()->email, ['class'=> 'form-control']) !!}
            </div>

            {{-- logo --}}
            <div class="form-group">
                {!! Form::label('logo',trans('admin.logo')) !!}
                {!! Form::file('logo', ['class'=> 'form-control','id'=>'logo']) !!}
            </div>
            <div id="logo-output" class="mb-3"></div>
             {{-- Get Latest Logo --}}
            <div class="form-group">
                @if(!empty(settings()->logo))
                    <img src="{{Storage::url(settings()->logo)}}" alt="" class="img-thumbnail thumb">
                @endif
            </div>
            {{-- icon --}}
            <div class="form-group">
                {!! Form::label('icon',trans('admin.icon')) !!}
                {!! Form::file('icon', ['class'=> 'form-control','id'=>'icon']) !!}
            </div>
            <div id="icon-output" class="mb-3"></div>
             {{-- Get latest Icon image --}}
            <div class="form-group">
                @if(!empty(settings()->icon))
                    <img src="{{Storage::url(settings()->icon)}}" alt="" class="img-thumbnail thumb">
                @endif
            </div>
            {{-- description --}}
            <div class="form-group">
                {!! Form::label('description',trans('admin.description')) !!}
                {!! Form::textarea('description',settings()->description, ['class'=> 'form-control']) !!}
            </div>
            {{-- keywords --}}
            <div class="form-group">
                {!! Form::label('keywords',trans('admin.keywords')) !!}
                {!! Form::textarea('keywords',settings()->keywords, ['class'=> 'form-control']) !!}
            </div>
            {{-- main_lang --}}
            <div class="form-group">
                {!! Form::label('main_lang',trans('admin.main_lang')) !!}
                {!! Form::select('main_lang',['ar'=>trans('admin.ar'),'en'=>trans('admin.en')],settings()->main_lang, ['class'=> 'form-control']) !!}
            </div>
            {{-- status --}}
            <div class="form-group">
                {!! Form::label('status',trans('admin.status')) !!}
                {!! Form::select('status',['open'=>trans('admin.open'),'close'=>trans('admin.close')],settings()->status, ['class'=> 'form-control']) !!}
            </div>
            {{-- message_maintenance --}}
            <div class="form-group">
                {!! Form::label('message_maintenance',trans('admin.message_maintenance')) !!}
                {!! Form::textarea('message_maintenance',settings()->message_maintenance, ['class'=> 'form-control']) !!}
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

@stop

{{-- <div class="form-group">
    @if(!empty(settings()->logo))
        <img src="{{Storage::url(settings()->logo)}}" alt="" class="img-thumbnail thumb">
    @endif
</div> --}}

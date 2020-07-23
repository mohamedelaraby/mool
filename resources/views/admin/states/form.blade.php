{!! Form::token() !!}
{{-- name --}}
<div class="form-group">
  {!! Form::label('state_name_ar', trans('admin.state_name_ar')) !!}
  {!! Form::text('state_name_ar',old('state_name_ar') ?? $state->state_name_ar,[ 'class' =>'form-control', 'placeholder' =>trans('admin.city_name_ar'), 'auto-focus'=>'true' ])
  !!}
</div>

<div class="form-group">
  {!! Form::label('state_name_en', trans('admin.state_name_en')) !!}
  {!! Form::text('state_name_en',old('state_name_en') ?? $state->state_name_en, [ 'class' =>'form-control',  'placeholder' =>trans('admin.city_name_en'),  'auto-focus'=>'true' ])
  !!}
</div>


<div class="form-group">
    {!! Form::label('country_id', trans('admin.country_id')) !!}
    {!! Form::select('country_id',
       country_name

       (),
    old('country_id'), ['class' =>'form-control', 'auto-focus'=>'true'])
    !!}
  </div>



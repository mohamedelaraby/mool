{!! Form::token() !!}
{{-- name --}}
<div class="form-group">
  {!! Form::label('country_name_ar', trans('admin.country_name_ar')) !!}
  {!! Form::text('country_name_ar',old('country_name_ar') ?? $country->country_name_ar,[ 'class' =>'form-control', 'placeholder' =>trans('admin.country_name_ar'), 'auto-focus'=>'true' ])
  !!}
</div>

<div class="form-group">
  {!! Form::label('country_name_en', trans('admin.country_name_en')) !!}
  {!! Form::text('country_name_en',old('country_name_en') ?? $country->country_name_en, [ 'class' =>'form-control',  'placeholder' =>trans('admin.country_name_en'),  'auto-focus'=>'true' ])
  !!}
</div>


<div class="form-group">
  {!! Form::label('code', trans('admin.code')) !!}
  {!! Form::text('code', old('code') ?? $country->code,[ 'class' =>'form-control', 'placeholder' =>trans('admin.code'), 'auto-focus'=>'true' ])
  !!}
</div>

<div class="form-group">
  {!! Form::label('mobile', trans('admin.mobile')) !!}
  {!! Form::text('mobile', old('mobile') ?? $country->mobile, [ 'class' =>'form-control',  'placeholder' =>trans('admin.mobile'),  'auto-focus'=>'true' ])
  !!}
</div>

<div class="form-group">
  {!! Form::label('logo', trans('admin.country_logo')) !!}
  {!! Form::file('logo', [ 'class' =>'form-control',  'placeholder' =>trans('admin.country_logo'),  'auto-focus'=>'true' ])
  !!}
</div>
<div id="logo-output" class="mb-3"></div>

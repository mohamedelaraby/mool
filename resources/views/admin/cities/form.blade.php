{!! Form::token() !!}
{{-- name --}}
<div class="form-group">
  {!! Form::label('city_name_ar', trans('admin.city_name_ar')) !!}
  {!! Form::text('city_name_ar',old('city_name_ar') ?? $city->city_name_ar,[ 'class' =>'form-control', 'placeholder' =>trans('admin.city_name_ar'), 'auto-focus'=>'true' ])
  !!}
</div>

<div class="form-group">
  {!! Form::label('city_name_en', trans('admin.city_name_en')) !!}
  {!! Form::text('city_name_en',old('city_name_en') ?? $city->city_name_en, [ 'class' =>'form-control',  'placeholder' =>trans('admin.city_name_en'),  'auto-focus'=>'true' ])
  !!}
</div>


<div class="form-group">
    {!! Form::label('country_id', trans('admin.country_id')) !!}
    {!! Form::select('country_id',
       countries(),
    old('country_id'), ['class' =>'form-control', 'auto-focus'=>'true'])
    !!}
  </div>



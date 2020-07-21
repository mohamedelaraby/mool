{!! Form::token() !!}
{{-- name --}}
<div class="form-group">
  {!! Form::label('name', trans('admin.name')) !!}
  {!! Form::text('name',old('name') ?? $admin->name,
               [ 'class' =>'form-control',
                // 'required' =>true,
                'placeholder' =>trans('admin.name'),
                'auto-focus'=>'true' ])
  !!}
</div>

{{-- Email --}}
<div class="form-group">
  {!! Form::label('email', trans('admin.email')) !!}
  {!! Form::email('email',old('email') ?? $admin->email,
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

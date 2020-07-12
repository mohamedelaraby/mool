{{-- if level is user then bg-info --}}
{{-- if level is company then bg-success --}}
{{-- if level is vendor then bg-primary --}}
<h3 class="
{{-- {{ $level == 'user'? 'badge badge-secondary': ''}} --}}
{{ $level == 'user'? 'badge badge-secondary': ''}}
{{ $level == 'company'? 'badge badge-success': ''}}
{{ $level == 'vendor'? 'badge badge-primary': ''}}
">

    {{trans('admin.'.$level)}}
</h3>
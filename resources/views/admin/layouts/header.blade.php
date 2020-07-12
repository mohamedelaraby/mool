<!DOCTYPE html>
@if(app()->getLocale() == 'en')

<html dir="ltr" lang="en">
@else
<html dir="rtl" lang="ar">
@endif
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{ !empty($title) ? $title: trans('admin.admin_panel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('admin.layouts.style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

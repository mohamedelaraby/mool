<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
@if(app()->getLocale() == 'en')
<html dir="ltr" lang="en">
@else
<html dir="rtl" lang="ar">
@endif
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mool - @yield('title')</title>

 @include('front.layouts.styles.main-style')
  </head>
  <body>

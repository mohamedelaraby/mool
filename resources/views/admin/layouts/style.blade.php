  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{admin_ui('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{admin_ui('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{admin_ui('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{admin_ui('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{admin_ui('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{admin_ui('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <!-- Theme style -->
  @if(app()->getLocale()=='en')
  <link rel="stylesheet" href="{{admin_ui('dist/css/adminlte.min.css')}}">
  @else
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/bootstrap-rtl.min.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/rtl/custom-style.css')}}">
  <link rel="stylesheet" href="{{admin_ui('dist/css/fonts/font-awesome.min.css')}}">
  @endif
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{admin_ui('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{admin_ui('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{admin_ui('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href=" {{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap&subset=arabic,latin-ext" rel="stylesheet">
  {{-- Custom style --}}
  <link rel="stylesheet" href="{{admin_ui('dist/css/style.css')}}">

<style>
  html,body,h1,h2,h3,h4{
    font-family: 'Cairo', sans-serif;
  }
</style>


@extends('admin.index')

@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              {{--   Start Datatable --}}
          {!! Form::open(['id'=>'form-data', 'route'=>'countries.delete-all','method'=> 'POST']) !!}
          {!! Form::hidden('_method','DELETE') !!}
            {!!$dataTable->table([
              'class' => 'datatable table table-bordered table-striped table-hover'
            ],true)!!}
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

  <!-- Delete Records Modal -->
<div class="modal fade" id="multi_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.delete')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <div class="empty_record d-none ">
            <h4> {{trans('admin.please_check_some_records')}}</h4>
          </div>
          <div class="not_empty_record d-none">
            <h3> {{trans('admin.ask_delete_item')}} <span class="record_count"></span>? </h3>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <div class="empty_record d-none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close')}}</button>
      </div>
      <div class="not_empty_record d-none">
        <button type="button" class="btn btn-secondary mx-2 " data-dismiss="modal">{{trans('admin.no')}}</button>
        <button type="submit" name="del_all" class="btn btn-danger del_all"> {{trans('admin.yes')}} </input>
      </div>
      </div>
    </div>
  </div>

  @push('js')
  <script>
    deleteAll();
  </script>

  {{$dataTable->scripts()}}
  @endpush
{{--   End Datatable --}}
@endsection

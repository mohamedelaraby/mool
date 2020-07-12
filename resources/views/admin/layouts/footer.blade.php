<footer class="main-footer">
    <strong>
        <script> document.write(new Date().getFullYear());</script> <a href="http://mool.com">Mool.com</a></strong>
        &copy; {{ trans('admin.copyrights') }}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layouts.script')

@stack('js')
@stack('css')
</body>
</html>

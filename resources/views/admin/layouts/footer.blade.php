<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js') }}"></script>
<script>

    $('.nav-link').on('click', function () {
        if (!$(this).hasClass('active'))
        {
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
    });
</script>
</body>

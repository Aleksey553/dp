<footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="#">DriveService</a>.</strong>

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

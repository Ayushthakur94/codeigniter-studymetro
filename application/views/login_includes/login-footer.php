    <!-- jQuery 2.1.4 -->
    <script src="<?php admin_assets(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php admin_assets(); ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php admin_assets(); ?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
          <b>CodeInsect</b> Admin System | Version 1.5
     <!--  Anything you want -->
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="<?php echo base_url(); ?>">CodeInsect</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.nav-sidebar a').filter(function() {
      return this.href == url;
  }).addClass('active');

  // for treeview
  $('ul.nav-treeview a').filter(function() {
      return this.href == url;
  }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
  </script>

</body>
</html>
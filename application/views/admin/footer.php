<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
</footer>

<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>

<!-- jQuery -->
<script src="<?php echo site_url()?>/assets/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo site_url()?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo site_url()?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo site_url()?>/assets/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo site_url()?>/assets/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->
<script src="<?php echo site_url()?>/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo site_url()?>/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo site_url()?>/assets/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo site_url()?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo site_url()?>/assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo site_url()?>/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->
<script src="<?php echo site_url()?>/assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo site_url()?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo site_url()?>/assets/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url()?>/assets/dist/js/demo.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo site_url()?>/assets/dist/js/pages/dashboard.js"></script>

<!-- SweetAlert2 -->
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
};

var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
function nextProgress(id){
  $.ajax({
    url : "nextProgress",
    type : "GET",
    data : {
      id:id
    },
    dataType : "JSON",
    success : function(result){
      if (result.status) {
            // alert("woy")
            Swal.fire({
              icon: 'success',
              title: result.keterangan
            }).then(function(){ 
                location.reload()
            })
      }
    }
  })
}  


      
function pay(id){
  $.ajax({
    url : "getOrderTransaction",
    type : "GET",
    data : {
      id:id
    },
    dataType : "JSON",
    success : function(result){
          $(".invoice").html(result.html);
          $("#btn-checkout").html('<button type="button" class="btn btn-primary" onclick="checkout('+id+')">Checkout</button>')
          $("#invoice").modal('show');

      
    }
  })
} ;

function checkout(id){
  $.ajax({
    url : "payOrder",
    type : "GET",
    data : {
      id:id
    },
    dataType : "JSON",
    success : function(result){
        $("#invoice").modal('hide');
            // alert("woy")
            if (result) {
              Swal.fire({
              icon: 'success',
              title: 'Order has been paid'
            }).then(function(){ 
                location.reload()
            })
            }
            
      
    }
  })
};
</script>
</body>
</html>
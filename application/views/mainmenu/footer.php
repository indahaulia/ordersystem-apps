
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hi <?php echo $_SESSION['customer_logged'] ?> !</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Nikmati menu spesial dari kami dan dapatkan kode voucher dari kami</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<script>
var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    $(function(){
      // if ($.cookie('pop') == null) {
        // $("#modal-lg").modal("show");
        // $.cookie('pop', '7');
      //  }

      // timeOutSession();
      countCart();
      
    });

    function timeOutSession() {
      setTimeout(function(){ alert("Are you still there ?"); }, 30000);
    }

    function changeMenu(th,id){
      $('a.nav-link').removeClass('active');
      $(th).addClass('active');
      $('div.d-block').removeClass('d-block').addClass('d-none');
      $('#'+id).removeClass('d-none').addClass('d-block');
    }

    function addToCart(id){
      $("#qty").val(1);
      $("#keterangan").val("");
          
      $.ajax({
        type : "GET",
        url : "getDishert",
        data : {
          id:id
        },
        dataType : "JSON",
        success:function(result){
          console.log(result[0].img);
          $("#img-product").attr('src',"../assets/product_img/"+result[0].img)
          $("#name-product").html(result[0].dish_name)
          $("#dish_id").val(result[0].dish_id)
          $("#price").val(result[0].price)
          $("#ketprice").html(result[0].price)
          $("#total").val(result[0].price);
          $("#kettotal").html(result[0].price);
          $("#addToCart").modal('show');
        }
      })
      console.log(id)
    }

    $("#qty").change(function(){
      var qty = $(this).val();
      var price = $("#price").val();
      var total = qty * price;
      $("#total").val(total);
      $("#kettotal").html(total);
    })

    $("#btn-addtocart").click(function(){
      var dish_id = $("#dish_id").val();
      var qty = $("#qty").val();
      var price = $("#price").val();
      var keterangan = $("#keterangan").val();
      // alert(keterangan);
      $.ajax({
        url : "addToCart",
        type : "POST",
        data : {
          id : dish_id,
          qty : qty,
          price : price,
          note : keterangan,
        },
        success : function(result){
          
          
          if (result) {
            // alert("woy")
            Toast.fire({
              icon: 'success',
              title: 'successfully added item to cart'
            })
            $("#addToCart").modal('hide');
            countCart();
          }

        }
      })
    });

    function countCart(){
      $.ajax({
        url : "countCart",
        type : "GET",
        success : function(result){
          $("#cartcount").html(result);
          if (result == 0) {
            $("#checkout").hide();
          }else{
            $("#checkout").show();
          }
        }
      })
    }

    function showCart(){
      $.ajax({
        url : "showCart",
        type : "GET",
        dataType : "JSON",
        success : function(result){
          
          $("#table-cart").html(result.html);
          if(!($("#cart").data('bs.modal') || {})._isShown){
            $("#cart").modal('show');
          }  

        }
      })
    }

    function delFromCart(th, id){
      $.ajax({
        url : "delFromCart",
        type : "POST",
        data : {
          id : id
        },
        dataType : "JSON",
        success : function(result){
          if (result) {
            showCart();
            Toast.fire({
              icon: 'success',
              title: 'Successfully deleted item from cart'
            })
          }
          countCart();
        }
      })
    }

    $("#checkout").click(function(){
      dine_in = $("#dine_in").val();
      $.ajax({
        url : "checkout",
        type : "POST",
        data : {
          dine_in : dine_in
        },
        success : function(result){
          if (result!==0) {
            $("#cart").modal('hide');
            Swal.fire({
              icon: 'success',
              title: 'Pesanan anda akan segera kami layani',
              confirmButtonText: 'OK',
            }).then((hasil) => {
              if (hasil.isConfirmed) {
                $("#no_queue").html(result);
                $("#no_antrian").modal('show');
              }
            })
            
          }   
        }
      })
    })


</script>
</body>
</html>
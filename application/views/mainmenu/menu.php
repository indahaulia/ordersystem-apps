<!-- <?php print_r($foods[2]) ?> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white d-block" id="bestseller">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Best Seller</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Collapsed Sidebar</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="post">
              <div class="row mb-3">
              <?php for ($i=0; $i < sizeof($bestseller); $i++) { ?>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2" onClick="addToCart(<?php echo $bestseller[$i]->dish_id; ?>)">
                    <img class="card-img-top" src="<?php echo base_url('assets/product_img/'.$bestseller[$i]->img) ?>" style="height: 318px" alt="<?php echo $bestseller[$i]->dish_name;?>">
                    <div class="card-img-overlay d-flex flex-column justify-content-center" style="background-image: linear-gradient(to bottom, rgba(255,0,0,0),rgba(0,0,0,0.2),rgba(0,0,0,0.5), rgba(0,0,0,1));">
                      <h5 class="card-title text-white mt-5 pt-2"><?php echo $bestseller[$i]->dish_name; ?></h5>
                      <p class="card-text pb-2 pt-1 text-white">
                        <!-- Lorem ipsum dolor sit amet, <br>
                        consectetur adipisicing elit <br>
                        sed do eiusmod tempor. -->
                      </p>
                      <a href="#" class="text-white"><?php echo "IDR. ".$bestseller[$i]->price; ?></a>
                    </div>
                  </div>
                </div>
              <?php } ?>

              </div>
                      <!-- /.row -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="content-wrapper bg-white d-none" id="foods">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Foods</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Collapsed Sidebar</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="post">
              <div class="row mb-3">
              <?php for ($i=0; $i < sizeof($foods); $i++) { ?>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2" onClick="addToCart(<?php echo $foods[$i]->dish_id; ?>)">
                    <img class="card-img-top" src="<?php echo site_url('assets/product_img/'.$foods[$i]->img) ?>" style="height: 318px" alt="<?php echo $foods[$i]->dish_name;?>">
                    <div class="card-img-overlay d-flex flex-column justify-content-center" style="background-image: linear-gradient(to bottom, rgba(255,0,0,0),rgba(0,0,0,0.2),rgba(0,0,0,0.5), rgba(0,0,0,1));">
                      <h5 class="card-title text-white mt-5 pt-2"><?php echo $foods[$i]->dish_name; ?></h5>
                      <p class="card-text pb-2 pt-1 text-white">
                        <!-- Lorem ipsum dolor sit amet, <br>
                        consectetur adipisicing elit <br>
                        sed do eiusmod tempor. -->
                      </p>
                      <a href="#" class="text-white"><?php echo "IDR. ".$foods[$i]->price; ?></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
                </div>
                      <!-- /.row -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <div class="content-wrapper bg-white d-none" id="drinks">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Drinks</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Collapsed Sidebar</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="post">
              <div class="row mb-3">
              <?php for ($i=0; $i < sizeof($drinks); $i++) { ?>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2" onClick="addToCart(<?php echo $drinks[$i]->dish_id; ?>)">
                    <img class="card-img-top" src="<?php echo site_url('assets/product_img/'.$drinks[$i]->img)?>" style="height: 318px" alt="<?php echo $drinks[$i]->dish_name;?>">
                    <div class="card-img-overlay d-flex flex-column justify-content-center" style="background-image: linear-gradient(to bottom, rgba(255,0,0,0),rgba(0,0,0,0.2),rgba(0,0,0,0.5), rgba(0,0,0,1));">
                      <h5 class="card-title text-white mt-5 pt-2"><?php echo $drinks[$i]->dish_name; ?></h5>
                      <p class="card-text pb-2 pt-1 text-white">
                        <!-- Lorem ipsum dolor sit amet, <br>
                        consectetur adipisicing elit <br>
                        sed do eiusmod tempor. -->
                      </p>
                      <a href="#" class="text-white"><?php echo "IDR. ".$drinks[$i]->price; ?></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
                </div>
                      <!-- /.row -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <div class="content-wrapper bg-white d-none" id="snacks">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Snacks</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Collapsed Sidebar</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="post">
              <div class="row mb-3">
              <?php for ($i=0; $i < sizeof($snacks); $i++) { ?>
                <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2" onClick="addToCart(<?php echo $snacks[$i]->dish_id; ?>)">
                    <img class="card-img-top" src="<?php echo site_url('assets/product_img/'.$snacks[$i]->img) ?>" style="height: 318px" alt="<?php echo $snacks[$i]->dish_name;?>">
                    <div class="card-img-overlay d-flex flex-column justify-content-center" style="background-image: linear-gradient(to bottom, rgba(255,0,0,0),rgba(0,0,0,0.2),rgba(0,0,0,0.5), rgba(0,0,0,1));">
                      <h5 class="card-title text-white mt-5 pt-2"><?php echo $snacks[$i]->dish_name; ?></h5>
                      <p class="card-text pb-2 pt-1 text-white">
                        <!-- Lorem ipsum dolor sit amet, <br>
                        consectetur adipisicing elit <br>
                        sed do eiusmod tempor. -->
                      </p>
                      <a href="#" class="text-white"><?php echo "IDR. ".$snacks[$i]->price; ?></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
                </div>
                      <!-- /.row -->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="addToCart">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add to Cart</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <img class="img-fluid" id="img-product" src="" alt="" style="max-height:400px;">
                </div>
                <div class="col-sm-12 col-md-6">
                  <form class="form-addtocart">
                    <h3><span id="name-product"></span></h3>
                    <input type="hidden" id="dish_id" name="dish_id" value="">
                    <label>Qty : </label>
                    <input class="form-control" id="qty" type="number" name="qty" value="1">
                    <label>Keterangan : </label>
                    <textarea class="form-control" rows="3" cols="5" name="keterangan" id="keterangan"></textarea>
                    <label>Price : </label>
                    <input type="hidden" name="price" id="price"><span id="ketprice"></span>
                    <label>Total : </label>
                    <input type="hidden" name="total" id="total"><span id="kettotal"></span>
                  </form>
                   
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="btn-addtocart" class="btn btn-primary">Add to cart</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="cart">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Your Cart</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12 col-md-6 mb-3">
                  <select class="form-control" id="dine_in">
                    <option value="1" selected>Dine in</option>
                    <option value="0">Take away</option>
                  </select>
                </div>
                <div class="col-sm-12">
                  <table class="table table-stripped table-hover" id="table-cart">
                  
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" id="checkout" class="btn btn-primary">Checkout</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="no_antrian">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <!-- <div class="modal-header">
              <h4 class="modal-title">No Antrian</h4>
            </div> -->
            <div class="modal-body text-center">
                <p>No antrian anda  </p>
                <h1><span id="no_queue"></span></h1>
                <p>Terimakasih atas pesanannya.</p>
                <a type="button" id="logout" class="btn btn-primary" href="<?php echo site_url().'mainmenu/logout'?>">Oke</a>

            </div>
            <!-- <div class="modal-footer justify-content-between">
            </div> -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
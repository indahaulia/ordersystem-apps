<!-- Tabel Show Data-->
<body>
<div class="content-wrapper pt-3 px-1 " >
<div class="container-fluid">
<!-- DataTables -->
<div class="card mb-3">
  <div class="card-header">
    <a  href="<?php echo site_url('Dashboard/forminput')?>"><i class="fas fa-plus"></i> Add New</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Dish Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dishert as $dishert): ?>
          <tr>
            <td width="150">
              <?php echo $dishert->dish_name ?>
            </td>
            <td>
              <?php echo $dishert->category ?>
            </td>
            <td>
              <?php echo $dishert->price ?>
            </td>
            <td class="small">
              <img src="<?php echo base_url('/assets/product_img/'.$dishert->img) ?>" width="64" />
            <td width="250">
              <a href="<?php echo site_url('Dashboard/edit/'.$dishert->dish_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
              <a onclick="deleteConfirm('<?php echo site_url('Dashboard/delete/'.$dishert->dish_id) ?>')"href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<!-- Tampilan konfirmasi untuk  delete menu -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

</body>


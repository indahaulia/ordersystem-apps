<!-- Tabel Show Data-->
<body>
<div class="content-wrapper pt-3 px-1 " >
<div class="container-fluid">
<!-- DataTables -->
<div class="card mb-3">
  <div class="card-header">
    <h3>Kitchen Progress</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>No Queue</th>
            <th>Customer Name</th>
            <th>Transaction Date</th>
            <th>Progress</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order as $ord): ?>
            <?php  if ($ord->kitchen_progress == 0) {
                  $keterangan = "Waiting List";
                  $badgeColor = "badge-secondary";
                  $nextProgress = "Progress";
                  $btnColor = "btn-primary";
                }else{
                  $keterangan = "On Progress";
                  $badgeColor = "badge-primary";  
                  $nextProgress = "Done";
                  $btnColor = "btn-danger";
                } ?>
          <tr>
            <td width="150">
              <?php echo $ord->order_id ?>
            </td>
            <td>
              <?php echo $ord->no_queue ?>
            </td>
            <td>
              <?php echo $ord->customer_name ?>
            </td>
            <td>
              <?php echo $ord->trx_date ?>
            </td>
            <td>
              <span class="right badge <?php echo $badgeColor ?>">
                <?php echo $keterangan ?>
              </span>
            </td>
            <td width="250">
              <a class="btn btn-xs <?php echo $btnColor ?>" onclick="nextProgress(<?php echo $ord->order_id ?>)"><?php echo $nextProgress ?></a>
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

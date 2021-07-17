<!-- Tabel Show Data-->
<style>
@media screen {
  #printSection {
      display: visible;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
    width:100%;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}

</style>
<body>
<div class="content-wrapper pt-3 px-1 " >
<div class="container-fluid">
<!-- DataTables -->
<div class="card mb-3">
  <div class="card-header">
    <a  href="<?php echo site_url('Cashier_c')?>"><i class="fas fa-plus"></i> Add New</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Transaction Date</th>
            <th>Total</th>
            <th>Tax</th>
            <th>Grand Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($order as $ord): ?>
          <tr>
            <td width="150">
              <?php echo $ord->order_id ?>
            </td>
            <td>
              <?php echo $ord->customer_name ?>
            </td>
            <td>
              <?php echo $ord->trx_date ?>
            </td>
            <td style="text-align:right">              
                <?php echo $ord->total ?>
            </td>
            <td style="text-align:right">              
                <?php echo $ord->tax ?>
            </td>
            <td style="text-align:right">              
                <?php echo $ord->total + $ord->tax ?>
            </td>
            <td width="250">
              <a class="btn btn-xs btn-primary" onclick="pay(<?php echo $ord->order_id ?>)">Pay</a>
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

<div class="modal fade" id="invoice">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Invoice</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="printSection">
                <div class="wrapper">
                    <!-- Main content -->
                    <section class="invoice">
                      
                    </section>
                    <!-- /.content -->
                  </div>
                  <!-- ./wrapper -->
            </div>
            <div class="modal-footer justify-content-between">
                <a rel="noopener" target="_blank" class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</a>
             <div id="btn-checkout"></div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script>
      function printElement(elem, append, delimiter) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    if (append !== true) {
        $printSection.innerHTML = "";
    }

    else if (append === true) {
        if (typeof (delimiter) === "string") {
            $printSection.innerHTML += delimiter;
        }
        else if (typeof (delimiter) === "object") {
            $printSection.appendChild(delimiter);
        }
    }

    $printSection.appendChild(domClone);
}​

      </script>
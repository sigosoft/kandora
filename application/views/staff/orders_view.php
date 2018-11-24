<!DOCTYPE html>
<html>
  <head>
    <?php include('includes.php'); ?>
    <link href="<?=base_url()?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="wrapper">
      <?php include('sidebar.php');?>
      <div class="content-page">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box">
                  <h4 class="page-title float-left">VIEW ORDER</h4>
                  <ol class="breadcrumb float-right">
                    <button type="button" class="btn btn-gradient btn-rounded waves-light waves-effect w-md" onclick="window.location='<?=site_url("orders/showInvoice/".$invoice->invoice_id)?>'">Print invoice</button>
                  </ol>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
                <div class="card-box">

                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#customer-details" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Customer details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#order-summary" data-toggle="tab" aria-expanded="true" class="nav-link">
                                Order summary
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#measurements" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Measurements
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="customer-details">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Name</td>
                                  <td><?=$customer->customer_name?></td>
                                </tr>
                                <tr>
                                  <td>Mobile</td>
                                  <td><?=$customer->customer_mobile?></td>
                                </tr>
                                <tr>
                                  <td>Telephone</td>
                                  <td><?=$customer->telephone?></td>
                                </tr>
                                <tr>
                                  <td>Booked for</td>
                                  <td><?=$customer->member_name?></td>
                                </tr>
                                <tr>
                                  <td>Booked person mobile</td>
                                  <td><?=$customer->member_mobile?></td>
                                </tr>
                                <tr>
                                  <td>Account details</td>
                                  <td><?=$customer->account_details?></td>
                                </tr>
                                <tr>
                                  <td>Customer location</td>
                                  <td><?=$customer->customer_location?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="order-summary">
                          <table class="table">
                            <tbody>
                              <tr>
                                <td>Invoice number</td>
                                <td><b><?=$invoice->invoice_id?></b></td>
                              </tr>
                              <tr>
                                <td>Material</td>
                                <td><?=$invoice->material?></td>
                              </tr>
                              <tr>
                                <td>Size</td>
                                <td><?=$invoice->product?></td>
                              </tr>
                              <?php if ($invoice->product == 'kandora') { ?>
                                <tr>
                                  <td>Size</td>
                                  <td><?=$invoice->category?></td>
                                </tr>
                              <?php } ?>
                              <tr>
                                <td>Size</td>
                                <td><?=$invoice->size?></td>
                              </tr>
                              <tr>
                                <td>Quantity</td>
                                <td><?=$invoice->quantity?></td>
                              </tr>
                              <tr>
                                <td>Rate</td>
                                <td><?=$invoice->total?></td>
                              </tr>
                              <tr>
                                <td>VAT</td>
                                <td><?=$invoice->vat?></td>
                              </tr>
                              <tr>
                                <td>Grand total</td>
                                <td><?=$invoice->grand_total?></td>
                              </tr>
                              <tr>
                                <td>Status</td>
                                <?php if ($invoice->status == 'order') { ?>
                                  <td><button type="button" class="btn btn-info waves-effect waves-light btn-sm">Processing</button></td>
                                <?php }else{ ?>
                                  <td><button type="button" class="btn btn-success waves-effect waves-light btn-sm">Completed</button></td>
                                <?php } ?>
                              </tr>
                              <?php if ($invoice->status == 'order') { ?>
                                <tr>
                                  <td>Change status</td>
                                  <td>
                                    <form action="<?=site_url('order/change_status')?>" method="post">
                                      <div class="form-group">
                                        <select class="form-control" name="status">
                                          <option value="order">Processing</option>
                                          <option value="complete">Completed</option>
                                        </select>
                                      </div>
                                      <input type="hidden" name="invoice_id" value="<?=$invoice->invoice_id?>">
                                      <div class="form-group pull-right">
                                        <button type="submit" class="btn btn-info waves-effect waves-light btn-sm">Save</button>
                                      </div>
                                    </form>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="measurements">
                          <?php if ($invoice->product == 'kandora') { ?>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Chest</td>
                                  <td><b><?=$measure->chest?></b></td>
                                </tr>
                                <tr>
                                  <td>Waist</td>
                                  <td><?=$measure->waist?></td>
                                </tr>
                                <tr>
                                  <td>Hips</td>
                                  <td><?=$measure->hips?></td>
                                </tr>
                                <tr>
                                  <td>Shoulder</td>
                                  <td><?=$measure->shoulder?></td>
                                </tr>
                                <tr>
                                  <td>Sleeve</td>
                                  <td><?=$measure->sleeve?></td>
                                </tr>
                                <tr>
                                  <td>Neck</td>
                                  <td><?=$measure->neck?></td>
                                </tr>
                                <tr>
                                  <td>Down</td>
                                  <td><?=$measure->down?></td>
                                </tr>
                                <tr>
                                  <td>Plate</td>
                                  <td><?=$measure->plate?></td>
                                </tr>
                              </tbody>
                            </table>
                          <?php }elseif($invoice->product == 'shirt') { ?>

                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Length</td>
                                  <td><b><?=$measure->length?></b></td>
                                </tr>
                                <tr>
                                  <td>Chest</td>
                                  <td><b><?=$measure->chest?></b></td>
                                </tr>
                                <tr>
                                  <td>Waist</td>
                                  <td><?=$measure->waist?></td>
                                </tr>
                                <tr>
                                  <td>Hips</td>
                                  <td><?=$measure->hips?></td>
                                </tr>
                                <tr>
                                  <td>Shoulder</td>
                                  <td><?=$measure->shoulder?></td>
                                </tr>
                                <tr>
                                  <td>Sleeve</td>
                                  <td><?=$measure->sleeve?></td>
                                </tr>
                                <tr>
                                  <td>Neck</td>
                                  <td><?=$measure->neck?></td>
                                </tr>
                              </tbody>
                            </table>
                          <?php }elseif ($invoice->product == 'pants') { ?>

                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Waist</td>
                                  <td><?=$measure->waist?></td>
                                </tr>
                                <tr>
                                  <td>Hips</td>
                                  <td><?=$measure->hips?></td>
                                </tr>
                                <tr>
                                  <td>Length</td>
                                  <td><b><?=$measure->length?></b></td>
                                </tr>
                                <tr>
                                  <td>Inside length</td>
                                  <td><?=$measure->inside_length?></td>
                                </tr>
                                <tr>
                                  <td>Knee</td>
                                  <td><?=$measure->knee?></td>
                                </tr>
                                <tr>
                                  <td>Thigh</td>
                                  <td><?=$measure->thigh?></td>
                                </tr>
                                <tr>
                                  <td>Bottom</td>
                                  <td><?=$measure->bottom?></td>
                                </tr>
                              </tbody>
                            </table>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
          </div>
        </div>
      </div>
      <?php include('footer.php');?>
    </div>
  </body>
  <?php include 'scripts.php'; ?>
  <script src="<?=base_url()?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="<?=base_url()?>plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="<?=base_url()?>plugins/datatables/buttons.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>plugins/datatables/vfs_fonts.js"></script>
  <script src="<?=base_url()?>plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?=base_url()?>plugins/datatables/buttons.print.min.js"></script>
  <script src="<?=base_url()?>plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="<?=base_url()?>plugins/datatables/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#datatable').DataTable();

          //Buttons examples
          var table = $('#datatable-buttons').DataTable({
              lengthChange: false,
              buttons: ['copy', 'excel', 'pdf']
          });

          table.buttons().container()
                  .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
      } );

  </script>
</html>

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
                  <h4 class="page-title float-left"><?=strtoupper($customer)?> - FAMILY MEMBERS</h4>
                  <ol class="breadcrumb float-right">

                  </ol>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                  <table id="datatable" class="table table-bordered">
                   <thead>
                   <tr>
                     <th>Name</th>
                     <th>Mobile</th>

                     <th>View family members</th>
                   </tr>
                   </thead>
                   <tbody>
                     <?php foreach ($members as $member) { ?>
                       <tr>
                         <td><?=$member->member_name?></td>
                         <td><?=$member->member_mobile?></td>

                         <td><button class="btn btn-link" onclick="edit('<?=$member->member_id?>','<?=$member->type?>')"><i class="fa fa-edit" style="font-size:20px;"></i></button></td>
                       </tr>
                     <?php } ?>
                   </tbody>
               </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php');?>
    </div>

         <div id="edit-member" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-body">
                              <h2 class="text-uppercase text-center m-b-30">
                                  <span><h4>edit member</h4></span>
                              </h2>


                              <form class="form-horizontal" action="<?=site_url('customers/editMember')?>" method="post">

                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Name<span style="font-size:18px;color:red;"> *</span></label>
                                          <input type="text" name="member_name" id="member_name" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Mobile<span style="font-size:18px;color:red;"> *</span></label>
                                          <input type="number" name="member_mobile" id="member_mobile" class="form-control" min="0" required>
                                      </div>
                                  </div>
                                  

                                  <input type="hidden" name="member_id" id="member_id">
                                  <input type="hidden" name="type" id="type">
                                  <input type="hidden" name="customer_id" id="customer_id">
                                  <div class="form-group account-btn text-center m-t-10">
                                      <div class="col-12">
                                          <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                                          <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Edit</button>
                                      </div>
                                  </div>
                              </form>


                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
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
      function edit(id,type)
      {
        $('#member_id').val(id);
        $('#type').val(type);
        $.ajax({
          method: "POST",
          url: "<?=site_url('customers/getMemberById');?>",
          data : { id : id },
          dataType : "json",
          success : function( data ){
            $('#member_name').val(data.member_name);
            $('#member_mobile').val(data.member_mobile);
            $('#member_email').val(data.member_email);
            $('#member_location').val(data.member_location);
            $('#account_details').val(data.account_details);
            $('#member_telephone').val(data.member_telephone);
            $('#customer_id').val(data.customer_id);
            $('#edit-member').modal('show');
              }
        });
      }
  </script>
</html>

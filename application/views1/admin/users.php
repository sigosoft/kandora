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
                  <h4 class="page-title float-left">Users</h4>
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
                 <th>Email</th>
                 <th>Username</th>
                 <th>Edit</th>
                 <th>Change password</th>
             </tr>
             </thead>
             <tbody>
               <?php foreach ($users as $user) { ?>
                 <tr>
                     <td><?=$user->name?></td>
                     <td><?=$user->phone?></td>
                     <td><?=$user->email?></td>
                     <td><?=$user->username?></td>
                     <td style="text-align:center"><button type="button" class="btn btn-link" onclick="edit('<?=$user->user_id?>')"><i class="fa fa-wrench"></i></button></td>
                     <td style="text-align:center"><button type="button" class="btn btn-link" onclick="change('<?=$user->user_id?>')"><i class="fa fa-key"></i></button></td>
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
    <div id="edit-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
                 <div class="modal-content">

                     <div class="modal-body">
                         <h2 class="text-uppercase text-center m-b-30">
                             <span><h4>Add user</h4></span>
                         </h2>


                         <form class="form-horizontal" action="<?=site_url('admin/editUser')?>" method="post">

                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Name</label>
                                     <input type="text" name="name" id="name" class="form-control">
                                 </div>
                             </div>
                             <input type="hidden" name="user_id" id="user_id">
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Mobile</label>
                                     <input type="text" name="phone" id="phone" class="form-control" maxlength="10">
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Email</label>
                                     <input type="email" name="email" id="email" class="form-control">
                                 </div>
                             </div>

                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Username</label>
                                     <input type="text" name="username" id="username" class="form-control">
                                 </div>
                             </div>

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
         <div id="change-pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-body">
                              <h2 class="text-uppercase text-center m-b-30">
                                  <span><h4>Change password</h4></span>
                              </h2>


                              <form class="form-horizontal" action="<?=site_url('admin/changePassword')?>" method="post" onsubmit="return check()">

                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Password</label>
                                          <input type="text" name="password" id="pass1" class="form-control" required>
                                      </div>
                                  </div>
                                  <input type="hidden" name="u_id" id="u_id">
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Confirm password</label>
                                          <input type="text"  id="pass2" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="" style="text-align:center;color:red;padding-bottom:10px;" id="message">

                                  </div>


                                  <div class="form-group account-btn text-center m-t-10">
                                      <div class="col-12">
              <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                                          <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Change</button>
                                      </div>
                                  </div>

                              </form>


                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div>
    <?php include('scripts.php'); ?>
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
    <script>
    function edit(id)
    {
      $('#category_id').val(id);
      $.ajax({
          method: "POST",
          url: "<?php echo site_url('admin/getUserById');?>",
          dataType : "json",
          data : { id : id },
          success : function( data ){
            $('#name').val(data.name);
            $('#phone').val(data.phone);
            $('#email').val(data.email);
            $('#username').val(data.username);
            $('#user_id').val(id);
            $('#edit-user').modal('show');
          }
        });
    }
    function change(key)
    {
      $('#u_id').val(key);
      $('#change-pass').modal('show');
    }
    function check()
    {
      var pass1 = $('#pass1').val();
      var pass2 = $('#pass2').val();
      if (pass1 == pass2) {
        return true;
      }
      else {
        $('#message').text('Password mismatch');
        return false;
      }
    }
    </script>
  </body>
</html>

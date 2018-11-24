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
                  <h4 class="page-title float-left">STAFFS</h4>
                  <ol class="breadcrumb float-right">
                    <button type="button" class="btn btn-gradient btn-rounded waves-light waves-effect w-md"  data-toggle="modal" data-target="#add-staff">Add staff</button>
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
                     <th>Location</th>
                     <th>Role</th>
                     <th>Status</th>
                     <th>Username</th>
                     <th>Edit</th>
                     <th>Change password</th>
                   </tr>
                   </thead>
                   <tbody>
                     <?php foreach ($staffs as $staff) { ?>
                       <tr>
                         <td><?=$staff->name?></td>
                         <td><?=$staff->mobile?></td>
                         <td><?=$staff->email?></td>
                         <td><?=$staff->location?></td>
                         <td><?=$staff->role?></td>
                         <td><?=$staff->status?></td>
                         <td><?=$staff->username?></td>
                         <td><button class="btn btn-link" onclick="edit('<?=$staff->profile_id?>')"><i class="fa fa-edit" style="font-size:20px;"></i></button></td>
                         <td><button class="btn btn-link" onclick="change('<?=$staff->profile_id?>')"><i class="fa fa-key" style="font-size:20px;"></i></button></td>
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
    <div id="add-staff" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
                 <div class="modal-content">

                     <div class="modal-body">
                         <h2 class="text-uppercase text-center m-b-30">
                             <span><h4>Add staff</h4></span>
                         </h2>


                         <form class="form-horizontal" action="<?=site_url('staffs/add')?>" method="post">

                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Name<span style="font-size:18px;color:red;"> *</span></label>
                                     <input type="text" name="name" class="form-control" placeholder="Staff name" required>
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Mobile<span style="font-size:18px;color:red;"> *</span></label>
                                     <input type="number" name="mobile" class="form-control" min="0" required>
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Email</label>
                                     <input type="email" name="email" class="form-control" min="0">
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Location</label>
                                     <input type="text" name="location" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Role</label>
                                     <input type="text" name="role" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Status<span style="font-size:18px;color:red;"> *</span></label>
                                     <select class="form-control" name="status">
                                       <option value="Active">Active</option>
                                       <option value="Blocked">Blocked</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Choose a username<span style="font-size:18px;color:red;"> *</span></label>
                                     <input type="text" name="username" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Password<span style="font-size:18px;color:red;"> *</span></label>
                                     <input type="text" name="password" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group account-btn text-center m-t-10">
                                 <div class="col-12">
                                     <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                                     <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Add</button>
                                 </div>
                             </div>
                         </form>


                     </div>
                 </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->
         </div>
         <div id="edit-staff" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-body">
                              <h2 class="text-uppercase text-center m-b-30">
                                  <span><h4>edit staff</h4></span>
                              </h2>


                              <form class="form-horizontal" action="<?=site_url('staffs/edit')?>" method="post">

                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Name<span style="font-size:18px;color:red;"> *</span></label>
                                          <input type="text" name="name" id="name" class="form-control" placeholder="Staff name" required>
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Mobile<span style="font-size:18px;color:red;"> *</span></label>
                                          <input type="number" name="mobile" id="mobile" class="form-control" min="0" required>
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Email</label>
                                          <input type="email" name="email" id="email" class="form-control" min="0">
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Location</label>
                                          <input type="text" name="location" id="location" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Role</label>
                                          <input type="text" name="role" id="role" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Status<span style="font-size:18px;color:red;"> *</span></label>
                                          <select class="form-control" name="status" id="status">
                                            <option value="Active">Active</option>
                                            <option value="Blocked">Blocked</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Username<span style="font-size:18px;color:red;"> *</span></label>
                                          <input type="text" name="username" id="username" class="form-control" required>
                                      </div>
                                  </div>
                                  <input type="hidden" name="profile_id" id="profile_id">
                                  <div class="form-group account-btn text-center m-t-10">
                                      <div class="col-12">
                                          <button type="reset" class="btn w-lg btn-rounded btn-light waves-effect m-l-5" data-dismiss="modal">Back</button>
                                          <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Add</button>
                                      </div>
                                  </div>
                              </form>


                          </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div>
              <div id="change-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                       <div class="modal-dialog">
                           <div class="modal-content">

                               <div class="modal-body">
                                   <h2 class="text-uppercase text-center m-b-30">
                                       <span><h4>Change password</h4></span>
                                   </h2>


                                   <form class="form-horizontal" action="<?=site_url('staffs/password')?>" method="post" onsubmit="return check_password()">

                                       <div class="form-group m-b-25">
                                           <div class="col-12">
                                               <label for="select">New password<span style="font-size:18px;color:red;"> *</span></label>
                                               <input type="text" name="password" id="pass1" class="form-control" required>
                                           </div>
                                       </div>
                                       <div class="form-group m-b-25">
                                           <div class="col-12">
                                               <label for="select">Confirm password<span style="font-size:18px;color:red;"> *</span></label>
                                               <input type="text" id="pass2" class="form-control" required>
                                           </div>
                                       </div>
                                       <div class="form-group account-btn text-center m-t-10">
                                           <div class="col-12">
                                               <p id="pass-error" style="color:red;"></p>
                                           </div>
                                       </div>

                                       <input type="hidden" name="profile_id" id="profile">
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
      function edit(id)
      {
        $('#profile_id').val(id);
        $.ajax({
          method: "POST",
          url: "<?=site_url('staffs/getStaffById');?>",
          data : { id : id },
          dataType : "json",
          success : function( data ){
            $('#name').val(data.name);
            $('#mobile').val(data.mobile);
            $('#email').val(data.email);
            $('#location').val(data.location);
            $('#role').val(data.role);
            $('#username').val(data.username);
            $('#status').val(data.status);
            $('#edit-staff').modal('show');
              }
        });
      }
      function change(id)
      {
        $('#profile').val(id);
        $('#change-password').modal('show');
      }
      function check_password()
      {
        pass1 = $('#pass1').val();
        pass2 = $('#pass2').val();
        if (pass1 == pass2) {
          return true;
        }
        else {
            $('#pass-error').html('Password mismatch');
            return false;
        }
      }
  </script>
</html>

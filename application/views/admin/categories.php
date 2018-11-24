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
                  <h4 class="page-title float-left">Categories</h4>
                  <ol class="breadcrumb float-right">
                    <button type="button" class="btn btn-gradient btn-rounded waves-light waves-effect w-md"  data-toggle="modal" data-target="#add-category">Add category</button>
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
                 <th>Edit</th>
                 <th>Delete</th>
             </tr>
             </thead>
             <tbody>
               <?php foreach ($cat as $c) { ?>
                 <tr>
                     <td><?=$c->name?></td>
                     <td style="text-align:center"><button type="button" class="btn btn-link" onclick="edit('<?=$c->category_id?>')"><i class="fa fa-wrench"></i></button></td>
                     <td style="text-align:center"><button type="button" class="btn btn-link" onclick="del('<?=$c->category_id?>')"><i class="fa fa-trash"></i></button></td>
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
    <div id="add-category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
                 <div class="modal-content">

                     <div class="modal-body">
                         <h2 class="text-uppercase text-center m-b-30">
                             <span><h4>Add category</h4></span>
                         </h2>


                         <form class="form-horizontal" action="<?=site_url('admin/addCategory')?>" method="post">

                             <div class="form-group m-b-25">
                                 <div class="col-12">
                                     <label for="select">Category name</label>
                                     <input type="text" name="name" class="form-control" placeholder="Example : Wild life" required>
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
         <div id="edit-category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <div class="modal-body">
                              <h2 class="text-uppercase text-center m-b-30">
                                  <span><h4>Edit category</h4></span>
                              </h2>


                              <form class="form-horizontal" action="<?=site_url('admin/editCategory')?>" method="post">

                                  <div class="form-group m-b-25">
                                      <div class="col-12">
                                          <label for="select">Category name</label>
                                          <input type="text" name="name" id="cat_name" class="form-control" placeholder="Example : Wild life">
                                          <input type="hidden" name="cat_id" id="category_id">
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
            url: "<?php echo site_url('admin/getCategoryById');?>",
            dataType : "json",
            data : { id : id },
            success : function( data ){
              $('#cat_name').val(data.name);
              $('#edit-category').modal('show');
            }
          });
      }
      function del(key)
      {
        var result = confirm("Are you sure to delete this item?");
        if (result) {
          $.ajax({
              method: "POST",
              url: "<?php echo site_url('admin/deleteCategory');?>",
              dataType : "json",
              data : { key : key },
              success : function( data ){
                location.reload();
              }
            });
        }
      }
    </script>
  </body>
</html>

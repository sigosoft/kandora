<!DOCTYPE html>
<html>
  <head>
    <?php include('includes.php'); ?>
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
                  <h4 class="page-title float-left">PRODUCTS</h4>
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
                  <table class="table table-bordered">
                    <thead>
                      <th>Product image</th>
                      <th>Product name</th>
                      <th>Manage</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img src="<?=base_url()?>assets/images/kandora.png" width="100px"></td>
                        <td>Kandora</td>
                        <td><a class="btn btn-link" href="<?=site_url("prices/manage?type=kandora")?>"><i class="fa fa-edit" style="font-size:20px;"></i></a></td>
                      </tr>
                      <tr>
                        <td><img src="<?=base_url()?>assets/images/shirt.jpg" width="100px"></td>
                        <td>Uniform shirt</td>
                        <td><a class="btn btn-link" href="<?=site_url('prices/manage?type=shirt')?>"><i class="fa fa-edit" style="font-size:20px;"></i></a></td>
                      </tr>
                      <tr>
                        <td><img src="<?=base_url()?>assets/images/pants.jpg" width="100px"></td>
                        <td>Uniform pant</td>
                        <td><a class="btn btn-link" href="<?=site_url('prices/manage?type=pants')?>"><i class="fa fa-edit" style="font-size:20px;"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php');?>
    </div>
  </body>
  <?php include 'scripts.php'; ?>
</html>

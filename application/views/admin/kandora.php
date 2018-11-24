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
                  <h4 class="page-title float-left">MANAGE PRICE - <?=strtoupper($product)?></h4>
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
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card" style="width: 100%">
                        <div class="card-body">
                          <h6>DIAMOND</h6>
                          <hr>
                          <form action="<?=site_url('prices/kandoraPrice')?>" method="post">
                            <input type="hidden" name="product" value="<?=$product?>">
                            <input type="hidden" name="category" value="diamond">
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="select">Adult</label>
                                    <input type="number" name="adult" class="form-control" min="0" value="<?=$diamond['adult']?>" required>
                                </div>
                            </div>
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="select">Child</label>
                                    <input type="number" name="child" class="form-control" value="<?=$diamond['child']?>" min="0" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <button class="btn w-sm  btn-primary waves-effect waves-light pull-right" type="submit">Save</button>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card" style="width: 100%">
                        <div class="card-body">
                          <h6>GOLD</h6>
                          <hr>
                          <form action="<?=site_url('prices/kandoraPrice')?>" method="post">
                            <input type="hidden" name="product" value="<?=$product?>">
                            <input type="hidden" name="category" value="gold">
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="select">Adult</label>
                                    <input type="number" name="adult" class="form-control" min="0" value="<?=$gold['adult']?>" required>
                                </div>
                            </div>
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="select">Child</label>
                                    <input type="number" name="child" class="form-control" min="0" value="<?=$gold['child']?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <button class="btn w-sm  btn-primary waves-effect waves-light pull-right" type="submit">Save</button>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card" style="width: 100%">
                        <div class="card-body">
                          <h6>SILVER</h6>
                          <hr>
                          <form action="<?=site_url('prices/kandoraPrice')?>" method="post">
                            <input type="hidden" name="product" value="<?=$product?>">
                            <input type="hidden" name="category" value="silver">
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="select">Adult</label>
                                    <input type="number" name="adult" class="form-control" value="<?=$silver['adult']?>" min="0" required>
                                </div>
                            </div>
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="select">Child</label>
                                    <input type="number" name="child" class="form-control" min="0" value="<?=$silver['child']?>" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <button class="btn w-sm  btn-primary waves-effect waves-light pull-right" type="submit">Save</button>
                                </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
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

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mini Car Inventory System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert.css">

  </head>

  <body ng-app="myApp" ng-controller="Mainctrl">

    <!-- Navigation -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Car Inventory System</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <!-- <li class="active" ui-sref-active="active"><a ui-sref="/home">Home <span class="sr-only">(current)</span></a></li> -->
              <li ui-sref-active="active"><a ui-sref="/manufacturer">Manufacturer</a></li>
              <li ui-sref-active="active"><a ui-sref="/car_models">Car Models</a></li>
              <li ui-sref-active="active"><a ui-sref="/view_inventory">View Inventory</a></li>
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li> -->
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    <!-- Page Content -->
    <div class="container">
      <div ui-view="bodys"></div>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular-ui-router.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/nprogress.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/dirPagination.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/controllers/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/controllers/mainCtrl.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/controllers/manufacturerCtrl.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/controllers/carmodelsCtrl.js" type="text/javascript"></script>

  </body>

</html>

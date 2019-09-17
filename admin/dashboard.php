<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('includes/head_link.php');?>
</head>
    <body class="fixed-top">

        <!-- wrapper -->
        <div id="wrapper">
            <!-- BEGIN HEADER -->
            <?php include('includes/nav_header.php');?>     
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container">

              <?php include('includes/left_sidebar.php');?>

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3 class="pull-left">Admin Panel</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card cyan white-text clearfix">

                                    <div class="clearfix">
                                        <div class="row row-table">
                                            <div class="col-xs-5 text-center bg-dark card-content-right"><i class="icon-layers background-icon"></i></div>
                                            <div class="col-xs-7 text-center card-content-left">
                                                <p class="card-stats-title right panel-title">Students</p>
                                                <h4 class="right panel-middle margin-b-0">3100</h4>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="card orange white-text clearfix">
                                    <div class="clearfix">
                                        <div class="row row-table">
                                            <div class="col-xs-5 text-center bg-dark card-content-right"><i class="icon-user background-icon"></i></div>
                                            <div class="col-xs-7 text-center card-content-left">
                                                <p class="card-stats-title right panel-title">Teachers</p>
                                                <h4 class="right panel-middle margin-b-0">6,782</h4>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card teal white-text clearfix">
                                    <div class="clearfix">
                                        <div class="row row-table">
                                            <div class="col-xs-5 text-center bg-dark card-content-right"><i class="icon-list background-icon"></i></div>
                                            <div class="col-xs-7 text-center card-content-left">
                                                <p class="card-stats-title right panel-title">Subjects</p>
                                                <h4 class="right panel-middle margin-b-0">6,782</h4>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="card green white-text clearfix">
                                    <div class="clearfix">
                                        <div class="row row-table">
                                            <div class="col-xs-5 text-center bg-dark card-content-right"><i class="icon-like  background-icon"></i></div>
                                            <div class="col-xs-7 text-center card-content-left">
                                                <p class="card-stats-title right panel-title">Comments</p>
                                                <h4 class="right panel-middle margin-b-0">178</h4>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div> 
                    <div class="clearfix"></div>
                    <?php include('includes/footer.php');?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- /wrapper -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a>


        <!-- PRELOADER -->
        <div id="preloader">
            <div class="inner">
                <span class="loader"></span>
            </div>
        </div><!-- /PRELOADER -->


        <!-- JAVASCRIPT FILES -->
          <?php include('includes/footer_link.php');?>

 
    </body>
</html>
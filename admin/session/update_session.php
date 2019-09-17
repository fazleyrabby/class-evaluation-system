
<?php 
// session_start();
include('../includes/db/connection_db.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include('../includes/head_link.php');?>
    </head>
    <body class="fixed-top">

        <!-- wrapper -->
        <div id="wrapper">
            <!-- BEGIN HEADER -->
           <?php include('../includes/nav_header.php');?>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->

            <!-- BEGIN CONTAINER -->
            <div class="page-container"> 
                <?php include('../includes/left_sidebar.php');?>

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                     <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">
                                    <div class="row">
                                        <h4 class="pull-left">Edit session</h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end .page title-->
                        <div><?php
                        if(isset($_SESSION['alert'])){
                        echo '<div class="alert alert-danger">'.$_SESSION['alert'].'</div>';
                        unset($_SESSION['alert']);
                        }
                        ?></div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <div class="panel panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                       session List
                                    </div>
                                    <div class="panel-body">
                                         <!-- form -->
                                         <form class="form-horizontal" method="post" action="<?=$base?>/sql/update_sql.php">
                                         <?php 
                                         if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                        
                                            $sql = "SELECT * from session where id=$id";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                            
                                            $month = $row["session_name"];
                                            $year = $row["year"];
                                            
                                            
                                            ?>
                                          

                                          <input type="hidden" name="id" value="<?=$id?>">
                                                
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Session</label>
                                            <div class="col-lg-10">

                                            <select class="form-control" name="session_name" id="">
                                                <option value="">Select</option>
                                                <option value="jan-jun" <?php echo $month == "jan-jun" ? 'selected' : '' ?> >Jan-Jun</option>
                                                <option value="july-dec" <?php echo $month == "july-dec" ? 'selected' : '' ?> >July-Dec</option>
                                            </select>
                                            </div> 
                                            
                                            </div>

                                            <div class="form-group">
                                            <label class="col-lg-2 control-label">Year</label>

                                            <div class="col-lg-10">
                                            <select class="form-control" name="year" id="">
                                                <option value="">Select</option>
                                                <option value="2019" <?php echo $year == "2019" ? 'selected' : ''?>>2019</option>
                                                <option value="2020" <?php echo $year == "2020" ? 'selected' : ''?>>2020</option>
                                                <option value="2021" <?php echo $year == "2021" ? 'selected' : ''?>>2021</option>
                                                <option value="2022" <?php echo $year == "2022" ? 'selected' : ''?>>2022</option>
                                            </select>
                                            </div>
                                            </div>
                                    
                                      
                                          
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <input type="submit" class="btn btn-sm btn-primary" name="update_session" value="submit">
                                               
                                                </div>
                                            </div>
                                            <?php }}  }?>
                                        </form>
                                        <!-- form -->
                                    </div>
                                </div><!-- End .panel --> 
                            </div>
                        </div>
                    </div>  
                    <div class="clearfix"></div>
                   <?php include('../includes/footer.php');?>
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

      <?php include('../includes/footer_link.php');?>
   
    </body>
</html>
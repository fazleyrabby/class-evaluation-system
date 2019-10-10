
<?php include('../includes/db/connection_db.php');?>
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
                                        <h4 class="pull-left">Manage Semester</h4>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end .page title-->
                         <div><?php
                        if(isset($_SESSION['alert'])){
                        echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$_SESSION['alert'].'</div>';
                        unset($_SESSION['alert']);
                        }
                        ?></div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-card recent-activites">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                       Session List
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> Semester ID</th>
                                                        <th> Semester No</th>
                                                        <th> Semester Name</th>
                                                        <th> Action</th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>
                                                     
                                                   <?php 
                                                     	$sql = "SELECT * from semester";

                                                        $result = $conn->query($sql);

                                                        if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) { ?>

                                                        <tr>
                                                            <td><?php echo $row['id'];?></td>
                                                            <td><?php echo $row['semester_no'];?></td>
                                                            <td><?php echo $row['semester_name'];?>
                                                            </td>
                                                            
                                                         

                                                    <td class="text-center">
                                                        <a href="update_semester.php?id=<?php echo $row['id']?>"class="btn btn-success">
                                                        <i class="fa fa-pencil"></i> Update
                                                        </a>
                                                        <a onclick="return confirm('Are you sure want to delete')" href="<?=$base?>/sql/delete_sql.php?delete=delete_semester&&id=<?php echo $row['id']?>" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                    </td>
                                                        </tr>

                                                    <?php }  } ?>


                                                </tbody>
                                               
                                            </table>
                                        </div>
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
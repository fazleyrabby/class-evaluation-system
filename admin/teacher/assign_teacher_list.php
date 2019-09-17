
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
                                        <!-- <h4 class="pull-left">Assgined Teacher List</h4> -->
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
                                    Assgined Teacher List
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> Teacher ID </th>
                                                        <th> Teacher Name </th>
                                                        <th> Session </th>
                                                        <th> Subjects </th>
                                                        <th> Update </th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>
                                                     
                                                <?php 
                                                $sql = "SELECT 
                                                assign_teacher.id as id,
                                                assign_teacher.teacher_id as teacher_id,
                                                session.session_name as session,
                                                session.year as year,
                                                assign_teacher.subject_id as subject_id,
                                                teacher.name as teacher_name,
                                                group_concat(subject.subject_name) as subject
                                                from 
                                                    assign_teacher 
                                                    left join 
                                                    teacher on assign_teacher.teacher_id = teacher.teacher_id
                                                left join 
                                                    subject on find_in_set(subject.id, assign_teacher.subject_id) 
                                                left join 
                                                    session on          session.id=assign_teacher.session_id 
                                                where 
                                                    assign_teacher.status = 1
                                                group by 
                                                    assign_teacher.subject_id
                                                ";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>

                                                <tr>
                                                    <td><?php echo $row['teacher_id'];?></td>
                                                    <td><?php echo $row['teacher_name'];?></td>
                                                    <td><?php echo "(".$row['year'].") ".$row['session']?></td>
                                                    <td><?php echo $row['subject'];?></td>
                                                         

                                                    <td class="text-center">
                                                        <a href="update_assign_teacher.php?id=<?php echo $row['id']?>"class="btn btn-success">
                                                        EDIT
                                                        </a>  
                                                    </td>
                                                </tr>

                                                <?php } } ?>


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
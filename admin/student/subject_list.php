
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
                                <h4 class="pull-left">Data Tables</h4>
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
                                Your Subject List
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th> Subject ID </th>
                                            <th> Subject Name</th>
                                            <th> Taken By</th>
                                            <th> Daily Class Lecture </th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        <?php
                                        if (isset($_SESSION['member_id'])) {
                                            $student_id = $_SESSION['member_id'];
                                        }
                                        $sql = "SELECT 
                                        assign_teacher.id as ast_id,
                                        teacher.name as teacher_name,
                                        subject.subject_name as subject,
                                        subject.subject_id as subject_id
                                        FROM `assign_teacher` 
                                        left join subject 
                                        on subject.id=assign_teacher.subject_id 
                                        left join semester 
                                        on semester.id=subject.semester 
                                        left join section 
                                        on section.id=assign_teacher.section_id 
                                        left join teacher 
                                        on teacher.teacher_id=assign_teacher.teacher_id 
                                        left join registration 
                                        on assign_teacher.section_id=registration.section 
                                        where 
                                        subject.semester = (SELECT semester from registration where member_id = '$student_id') and
                                        registration.member_id = '$student_id' ";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) { ?>

                                                <tr>
                                                    <td><?php echo $row['subject_id'];?></td>
                                                    <td><?php echo $row['subject'];?></td>
                                                    <td><?php echo $row['teacher_name'];?></td>



                                                    <td class="text-center">
                                                        <a href="<?=$base?>/review/daily_class_review.php?ast_id=<?php echo $row['ast_id']?>"class="btn btn-success">
                                                            View
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
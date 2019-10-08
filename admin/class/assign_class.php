
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
                                        <h4 class="pull-left">Add Class</h4>
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
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->

                                    
                                    <div class="panel-heading">
                                      Add Class Form
                                    </div>
                                    <div class="panel-body">

                                    
                                        <!-- form -->
                                    <form class="form-horizontal" method="post" action="<?=$base?>/sql/insert_sql.php">
                                    <?php 
                                    
                                          if(isset($_GET['id'])){

                                            $ast_id = $_GET['id'];
                                          
                                          $sql = "SELECT teacher.name as name,
                                          section.section_name as section,
                                          session.session_name as session,
                                          session.year as s_year,
                                          subject.subject_name as subject
                                          from assign_teacher as ast
                                          left join session 
                                          on ast.session_id=session.id
                                          left join section
                                          on ast.section_id=section.id
                                          left join teacher 
                                          on teacher.teacher_id=ast.teacher_id
                                          left join subject
                                          on subject.id=ast.subject_id
                                          where ast.id=$ast_id
                                          and ast.status=1";
                                          $query=$conn->query($sql);
                                          if($query->num_rows > 0) {
                                              while($data = $query->fetch_assoc()){
                                                 $teacher_name=$data['name'];
                                                 $section=$data['section'];
                                                 $session=$data['session'];
                                                 $s_year=$data['s_year'];
                                                 $subject=$data['subject']; ?>

                                            <input type="hidden" value="<?=$ast_id?>" name="assign_teacher_id">

                                            <div class="form-group">
                                            <label class="col-lg-3 control-label">Session
                                            </label>
                                            <div class="col-lg-9">
                                            <?php echo $s_year." (".$session.")";?>
                                            </div>
                                            </div>
                                            

                                            <div class="form-group">
                                            <label class="col-lg-3 control-label">Subject Name
                                            </label>
                                    
                                            <div class="col-lg-9">
                                            <?=$subject;?>
                                            <!-- <input type="text" name="session" placeholder="Class Name" class="form-control">  -->
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-lg-3 control-label">Section Name
                                            </label>
                                    
                                            <div class="col-lg-9">

                                            <?=$section;?>
                                            <!-- <input type="text" name="session" placeholder="Class Name" class="form-control">  -->
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-lg-3 control-label">No. Of class
                                            </label>

                                            <div class="col-lg-9">
                                            <input type="number" name="total_class_number" placeholder="Enter total number of class" class="form-control"> 
                                            </div>
                                            </div>
                                   
                                          
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <input type="submit" class="btn btn-sm btn-primary" name="add_no_of_class" value="submit">
                                                </div>
                                            </div>

                                            <?php   }
                                          }

                                        }

                                    
                                        ?>
                                        </form>
                                        <!-- form -->

                                    </div>
                                </div>
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

          <script>
          $('.select2').select2();
          
          </script>

    </body>
</html>
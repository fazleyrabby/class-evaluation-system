

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
                                        <!-- <h4 class="pull-left">Add Subject</h4> -->
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

                        <div id="alert_box"></div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                      Update Student Form
                                    </div>
                                    <div class="panel-body">

                                    <!-- form -->
                                    <form class="form-horizontal" method="post" action="<?=$base?>/sql/update_sql.php" onsubmit="return validate();">
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];

                                        $sql = "SELECT 
                                        registration.member_id as student_id,
                                        registration.name as name,
                                        registration.email as email,
                                        registration.semester as semester,
                                        registration.department as dept,
                                        registration.section as section,
                                        login.username as username,
                                        login.id  as login_id,
                                        student.id as student_f_id
                                        from registration left join login on login.id=registration.login_id 
                                        left join student on
                                        student.student_id=registration.member_id 
                                        where registration.member_id = '$id'";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows == 1) {
                                            
                                            while ($t_data = $result->fetch_assoc()) {?>
                                        <input type="hidden" name="login_id" value="<?php echo $t_data['login_id']?>">
                                        <input type="hidden" name="student_f_id" value="<?php echo $t_data['student_f_id']?>">
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Student ID</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="student_id" placeholder="Student ID" value="<?php echo $t_data['student_id']?>" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Name</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="<?php echo $t_data['name']?>" name="name" placeholder="Name" class="form-control"> 
                                            </div>
                                        </div>



                                         
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Department</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control form-control-sm" name="department">
                                                    <option>Select Depertmant</option>
                                                    <?php
                                                        $sql = "SELECT * from department where status = 1";
                                                        $query = $conn->query($sql);
                                                        $row = $query->num_rows;
                                                        if ($row > 0) {
                                                            while ($data = $query->fetch_assoc()){
                                                                
                                                                $id = $data['id'];
                                                                $name = $data['department_name'];

                                                                if ($t_data['dept'] == $id) {
                                                                   $select = "selected";
                                                                }
                                                                else{
                                                                    $select = "";
                                                                }
                                                                
                                                                echo "<option value='$id' $select>$name</option>";
                                                            } 
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Section</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control form-control-sm" name="section">
                                                    <option>Select Section</option>
                                                    <?php
                                                        $sql = "SELECT * from section where status = 1";
                                                        $query = $conn->query($sql);
                                                        $row = $query->num_rows;
                                                        if ($row > 0) {
                                                            while ($data = $query->fetch_assoc()){
                                                                
                                                                $id = $data['id'];
                                                                $name = $data['section_name'];

                                                                if ($t_data['section'] == $id) {
                                                                   $select = "selected";
                                                                }
                                                                else{
                                                                    $select = "";
                                                                }
                                                                
                                                                echo "<option value='$id' $select>$name</option>";
                                                            } 
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Semester</label>
                                            <div class="col-lg-9">
                                                <select class="form-control form-control-sm" name="semester">
                                                    <option>Select Semester</option>
                                                    <?php
                                                    $sql = "SELECT * from semester where status = 1";
                                                    $query = $conn->query($sql);
                                                    $row = $query->num_rows;
                                                    if ($row > 0) {
                                                        while ($data = $query->fetch_assoc())
                                                        {

                                                            $id = $data['id'];
                                                            $name = $data['semester_name'];

                                                            if ($t_data['semester'] == $id) {
                                                                $select = "selected";
                                                            }
                                                            else{
                                                                $select = "";
                                                            }

                                                            echo "<option value='$id' $select>$name</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Email</label>
                                            <div class="col-lg-9">
                                                <input type="email" value="<?php echo $t_data['email']?>" name="email" placeholder="E-mail" class="form-control"> 
                                            </div>
                                        </div>
                                        
                                        <?php //if ($_SESSION['user_type'] == 3) :?>

                                        <h5 class="text-center"> LOGIN CREDENTIALS </h5>
                                        <!-- Bottom section for login data -->
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Username</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="username" value="<?php echo $t_data['username']?>" placeholder="Username" class="form-control"> 
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" name="password" placeholder="Password" id="password" class="form-control"> 
                                            </div>  
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Re-Password</label>
                                            <div class="col-lg-9">
                                                <input type="password" name="re_password" placeholder="Re-enter Password"  id="re_password" class="form-control"> 
                                            </div>  
                                        </div>

                                        <?php //endif; ?>
                                        
                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <input type="submit" class="btn btn-sm btn-primary" name="update_student" value="submit">
                                            </div>
                                        </div>  

                                        <?php    }
                                        }

                                    }
                                    
                                    ?>        
                                    </form>
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

        <script>

        var alert_box = document.querySelector('#alert_box');
        function validate(){
            
        var pass = document.querySelector('#password');
        var re_pass = document.querySelector('#re_password');
            if (pass.value != re_pass.value) {
                alert_box.innerHTML = "<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password Not Matched!!</div>";
                return false;
            }
            else{
                return true;
            }
        }

        </script>

    </body>
</html>
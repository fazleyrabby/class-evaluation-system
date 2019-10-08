   <aside class="sidebar">
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="<?=$base?>/index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
                            </li>
                            <?php 
                            // THIS PART IS ONLY FOR ADMIN //
                            
                            if($_SESSION['user_type'] == 1) : ?>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage Teacher</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/teacher/add_teacher.php">Add Teacher</a></li>
                                    <li><a href="<?=$base?>/teacher/teacher_list.php">Teacher List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage Student</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/student/add_student.php">Add Student</a></li>
                                    <li><a href="<?=$base?>/student/student_list.php">Student List</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage  Subject</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/subject/add_subject.php">Add Subject</a></li>
                                    <li><a href="<?=$base?>/subject/subject_list.php">Subject List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage  Section</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/section/add_section.php">Add Section</a></li>
                                    <li><a href="<?=$base?>/section/section_list.php">Section List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage  Session</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/session/add_session.php">Add Session</a></li>
                                    <li><a href="<?=$base?>/session/session_list.php">Session List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage Department</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/department/add_department.php">Add department</a></li>
                                    <li><a href="<?=$base?>/department/department_list.php">Department List</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Assign Teacher</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/teacher/assign_teacher.php">Assign Teacher</a></li>
                                    <li><a href="<?=$base?>/teacher/assign_teacher_list.php">Assign Teacher List</a></li>
                                </ul>
                            </li>

                            <?php 
                            
                            // ADMIN PART ENDS //

                            //=================//


                            // THIS PART FOR TEACHER //
                            elseif($_SESSION['user_type'] == 2) : ?>

                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage Classes</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/class/assigned_subject_list.php">Assigned Class List</a></li>

                                    <!-- <li><a href="<?=$base?>/class/assigned_subject_list.php">Course Outline List</a></li> -->
                                </ul>
                            </li>
                            
                            <!-- <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Manage Course Outline</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/course_outline/course_outline.php">Add Course Outline</a></li>
                                    <li><a href="<?=$base?>/course_outline/course_outline_list.php">Course Outline List</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Course Outline(Class)</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/class/assign_topics.php">Class Wise Topics</a></li>
                                    <li><a href="<?=$base?>/class/assign_topics_list.php">Class Wise Topics List</a></li>
                                </ul>
                            </li> -->

                            <!-- <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Assign Topics</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="</?=$base?>/class/assign_topics.php">Student Review Class</a></li>
                                    <li><a href="</?=$base?>/class/assign_topics_list.php">Review List</a></li>
                                </ul>
                            </li> -->
                            

                            <?php 
                            // TEACHER PART ENDS //
                            //=================//

                            // THIS PART FOR STUDENTS  //
                            elseif($_SESSION['user_type'] == 3) : ?>

                            <li>
                                <a href="#"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Assign Topics</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">                               
                                    <li><a href="<?=$base?>/class/assign_topics.php">Review Class</a></li>
                                    <li><a href="<?=$base?>/class/assign_topics_list.php">Review Class List</a></li>
                                </ul>
                            </li>


                            <?php 
                            
                            // STUDENTS PART ENDS //
                            //=================//


                            endif; ?>



                            <li class=""><a href="<?=$base?>/logout.php"><i class="fa fa-user"></i> <span class="nav-label"> &nbsp;Logout</span></a></li>
                          
                           

                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </nav>
                    <!-- END SIDEBAR -->
                </aside>
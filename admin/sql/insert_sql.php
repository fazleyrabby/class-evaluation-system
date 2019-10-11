<?php
session_start();
include('../includes/db/connection_db.php');
	
//================== *Registration Starts* ============================//

if (isset($_POST['signup'])) 
{
	$user_type=$_POST['user_type'];
	$member_id=$_POST['member_id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$user_type=$_POST['user_type'];
	$department=$_POST['department'];
	$password=md5($_POST['password']);

	// if ($user_type == 2) {     //for teacher
	// 	$table_name = "teacher"; //table name
	// 	$id = "teacher_id";      //same as $member_id for column_name
	// }
	// elseif($user_type == 3){   //for student
	// 	$table_name = "student"; //table name
	// 	$id = "student_id";      //same as $member_id for column_name
	// }

	// 	// For TEACHER or STUDENT details table
	// 	$details = "INSERT INTO ".$table_name." (name,".$id.",created_at) VALUES ('$name','$department','$member_id',now())";  

	//FOR LOGIN FORM//
	$login = "INSERT INTO login(username,password,user_type,created_at) VALUES ('$username','$password',$user_type,now())";

	if ($conn->query($login) === TRUE) 
	{
			$last_id = $conn->insert_id;
			//FOR REGISTRATION FORM//
			$reg = "INSERT INTO registration(name,email,section,department,member_id,login_id,created_at) VALUES ('$name','$section','$email','$department','$member_id',$last_id,now())";


			if ($conn->query($reg) === TRUE) 
			{
				$_SESSION['alert'] = "Registration Successful!";
				header('location: ../../login.php');
			}
	} 

	else
	{
			$_SESSION['alert'] = "Registration Error Occured!";
			header('location: ../../registration.php');
			
	}	

}


//================== *Registration Ends* ============================//



//================== *Add Subject Starts* ============================//

elseif(isset($_POST['add_subject'])) 
{
	$subject_id=$_POST['subject_id'];
	$subject_name=$_POST['subject_name'];
	$semester=$_POST['semester'];

	$sql = "INSERT INTO subject(subject_id,semester,subject_name,created_at) VALUES ('$subject_id',$semester,'$subject_name',now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "New Subject Added Successfully!";
		header('location: ../subject/subject_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../subject/add_subject.php');
	}	

}

//================== *Add Subject Ends* ============================//

	


//================== *Add Session Starts* ============================//

elseif(isset($_POST['add_session'])) 
{
	$session_title=$_POST['session_name'];
	$year=$_POST['year'];

	$sql = "INSERT INTO session (session_name,year,created_at) VALUES ('$session_title','$year',now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "New Session Added Successfully!";
		header('location: ../session/session_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../session/add_session.php');
	}	

}

//================== *Add Session Ends* ============================//




//================== *Add Semester Starts* ============================//

elseif(isset($_POST['add_semester']))
{
	$semester_name=$_POST['semester_name'];
	$semester_no=$_POST['semester_no'];

	$check_exist = "SELECT * from semester where semester_no=$semester_no and status=1";

	$result = $conn->query($check_exist);

	if($result->num_rows == 0){
		$sql = "INSERT INTO semester (semester_no,semester_name,created_at) VALUES ('$semester_no','$semester_name',now())";

		if ($conn->query($sql) === TRUE)
		{
			$_SESSION['alert'] = "New Semester Added Successfully!";
			header('location: ../semester/semester_list.php');
		}

		else
		{
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../semester/add_semester.php');
		}
	}
	else{
		$_SESSION['alert'] = "Semester Already Exists!";
		header('location: ../semester/add_semester.php');
	}



}

//================== *Add Semester Ends* ============================//



//================== *Add Department Starts* ============================//

elseif(isset($_POST['add_department'])) 
{

	$department_name=$_POST['subject_name'];

	$sql = "INSERT INTO subject(subject_name,created_at) VALUES ('$department_name',now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "New Department Added Successfully!";
		header('location: ../department/department_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../department/add_department.php');
	}	

}

//================== *Add Department Ends* ============================//




//================== *assign teacher Starts* ============================//

elseif(isset($_POST['assign_teacher'])) 
{

	$subjects = $_POST['subject'];
	$session = $_POST['session'];
	$teacher = $_POST['teacher'];
	$section = $_POST['section'];

	// $subject = implode(",",$subjects);  

	//CHECK IF ALREADY ASSIGNED FOR THIS SESSION

	// var_dump($_POST);
	// exit;
	$validation = "SELECT * FROM assign_teacher where session_id=$session and teacher_id='$teacher' and section_id = $section";

	$result = $conn->query($validation);

	if($result->num_rows == 0){

		$sql = "INSERT INTO assign_teacher(teacher_id,session_id,subject_id,section_id,created_at) VALUES ('$teacher','$session','$subjects','$section',now())";

		if ($conn->query($sql) === TRUE) 
		{
			$_SESSION['alert'] = "Subjects Assigned Successfully!";
			header('location: ../teacher/assign_teacher_list.php');
		}

		else
		{			
				$_SESSION['alert'] = "Error Occured!";
				header('location: ../teacher/assign_teacher.php');
		}	

	}
	else{

			$_SESSION['alert'] = "Already Assigned for this session!";
			header('location: ../teacher/assign_teacher_list.php');

	}


	

}

//================== *assign teacher Ends* ============================//



//================== *Add Teacher Start* ============================//
elseif (isset($_POST['add_teacher'])) 
{

$user_type = 2;  //type 2 = teacher 
$teacher_id=$_POST['teacher_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$department=$_POST['department'];
$password=md5($_POST['password']);

$login = "INSERT INTO login(username,password,user_type,created_at) VALUES ('$username','$password',$user_type,now())";

if ($conn->query($login) === TRUE) 
{
		$last_id = $conn->insert_id;
		//FOR REGISTRATION FORM//
		$reg = "INSERT INTO registration(name,email,section,department,member_id,login_id,created_at,authentication) VALUES ('$name','$email','$department','$teacher_id',$last_id,now(),1)";

		//FOR teacher table
		$teacher = "INSERT INTO teacher(teacher_id,name,status,created_at) VALUES ('$teacher_id','$name',1,now())";


		if ($conn->query($reg) === TRUE && $conn->query($teacher) === TRUE) 
		{
			$_SESSION['alert'] = "Registration Successful!";
			header('location: ../teacher/teacher_list.php');
		}
		else
		{
				$_SESSION['alert'] = "Registration Error Occured!";
				header('location: ../teacher/add_teacher.php');
				
		}	
} 

else
{
		$_SESSION['alert'] = "Registration Error Occured!";
		header('location: ../teacher/add_teacher.php');
		
}	

}

//================== *Add Teacher Ends* ============================//










//================== *Add Student Start* =====================//
elseif (isset($_POST['add_student'])) 
{

$user_type = 3;  //type 3 = student 
$student_id=$_POST['student_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$department=$_POST['department'];
$section=$_POST['section'];
$password=md5($_POST['password']);

$login = "INSERT INTO login(username,password,user_type,created_at) VALUES ('$username','$password',$user_type,now())";

if ($conn->query($login) === TRUE) 
{
		$last_id = $conn->insert_id;
		//FOR REGISTRATION FORM//
		$reg = "INSERT INTO registration(name,email,section,department,member_id,login_id,created_at,authentication) VALUES ('$name','$email','$section','$department','$student_id',$last_id,now(),1)";

		//FOR teacher table
		$student = "INSERT INTO student(student_id,name,status,created_at) VALUES ('$student_id','$name',1,now())";


		if ($conn->query($reg) === TRUE && $conn->query($student) === TRUE) 
		{
			$_SESSION['alert'] = "Registration Successful!";
			header('location: ../student/student_list.php');
		}
		else
		{
				$_SESSION['alert'] = "Registration Error Occured!";
				header('location: ../student/add_student.php');
				// echo mysqli_error($conn);
		}	
} 

else
{
		$_SESSION['alert'] = "Registration Error Occured!";
		header('location: ../teacher/add_teacher.php');
		
}	

}

//================== *Add Student Ends* ============================//


//================== *Add section Starts* ============================//

elseif(isset($_POST['add_section'])) 
{
	$section_name=$_POST['section_name'];

	$sql = "INSERT INTO section(section_name,created_at) VALUES ('$section_name',now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "New section Added Successfully!";
		header('location: ../section/section_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../section/add_section.php');
	}	

}

//================== *Add section Ends* ============================//



//================== *Add No of class starts* ============================//




elseif(isset($_POST['add_no_of_class'])) 
{
	$total_class_number=$_POST['total_class_number'];
	$assign_teacher_id=$_POST['assign_teacher_id'];

	$sql = "INSERT INTO assign_class(assign_teacher_id,number_of_class,created_at) VALUES ($assign_teacher_id,$total_class_number,now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Number Of Class assigned Successfully!";
		header('location: ../class/assigned_subject_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../class/assigned_subject_list.php');
	}	


}







//================== *Add No of class ends* ============================//



//================== *Add No of class starts* ============================//




elseif(isset($_POST['add_course_outline'])) 
{
	$class_no=$_POST['number_of_class'];
	$course_outline=mysqli_real_escape_string($conn,$_POST['course_outline']);
	$assign_class_id=$_POST['assign_class_id'];


	$sql = "INSERT INTO course_outline(assign_class_id,class_no,course_outline,created_at) VALUES ($assign_class_id,$class_no,'$course_outline',now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Class Outline added succesfully!";
		header('location: ../course_outline/assign_course_outline.php?id='.$assign_class_id.'');
	}

	else
	{		
			// mysqli_error($conn);	
			// exit;
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../course_outline/assign_course_outline.php?id='.$assign_class_id.'');
	}	


}


//================== *Add No of class ends* ============================//





//================== *Add No of class starts* ============================//




elseif(isset($_POST['add_course_outline_daily'])) 
{
	$class_no=$_POST['number_of_class'];
	$course_outline=mysqli_real_escape_string($conn,$_POST['course_outline']);
	$assign_class_id=$_POST['assign_class_id'];


	$sql = "INSERT INTO daily_class_lecture(assign_class_id,class_no,course_outline,created_at) VALUES ($assign_class_id,$class_no,'$course_outline',now())";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Class Outline added succesfully!";
		header('location: ../course_outline/daily_class_lecture.php?id='.$assign_class_id.'');
	}

	else
	{		
			mysqli_error($conn);	
			exit;
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../course_outline/daily_class_lecture.php?id='.$assign_class_id.'');
	}	


}




//================== *Add No of class ends* ============================//







//================== *Add Student Review Starts* ============================//

elseif(isset($_POST['add_review'])) 
{
	// print_r($_POST);
	// exit;
	$daily_class_lecture_id = $_POST['daily_class_lecture_id'];
	$comment=mysqli_real_escape_string($conn,$_POST['comment']);
	$student_id=$_POST['student_id'];
	$page_id=$_POST['page_id'];

	$exist = "SELECT * from class_review where daily_class_lecture_id = $daily_class_lecture_id and student_id='$student_id'";

	$query = $conn->query($exist);


	if ($query->num_rows == 0) {
		
			$sql = "INSERT INTO class_review(daily_class_lecture_id,comment,student_id,created_at) VALUES ($daily_class_lecture_id,'$comment','$student_id',now())";

			if ($conn->query($sql) === TRUE) 
			{
				$_SESSION['alert'] = "Your Review Successfully Added!";
				header('location: ../review/daily_class_review.php?ast_id='.$page_id.'');
			}
		
			else
			{		

					$_SESSION['alert'] = "Error Occured!";
					header('location: ../review/add_new_review.php?ast_id='.$page_id.'&&id='.$daily_class_lecture_id.'');
			}	
	}
	else{
		$_SESSION['alert'] = "Already Reviewd!";
		header('location: ../review/add_new_review.php?ast_id='.$page_id.'&&id='.$daily_class_lecture_id.'');
	}



}

//================== *Add Student Review Ends* ============================//










?>



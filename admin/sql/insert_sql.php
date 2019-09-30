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

	$sql = "INSERT INTO subject(subject_id,subject_name,created_at) VALUES ('$subject_id','$subject_name',now())";

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
		$_SESSION['alert'] = "New Subject Added Successfully!";
		header('location: ../session/session_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../session/add_session.php');
	}	

}

//================== *Add Session Ends* ============================//






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

?>



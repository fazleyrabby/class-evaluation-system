<?php
session_start();
include('../includes/db/connection_db.php');


//================== *Update Subject Starts* ============================//


if(isset($_POST['update_subject'])) 
{
	$id=$_POST['id'];
	$subject_id=$_POST['subject_id'];
	$subject_name=$_POST['subject_name'];



	$sql = "UPDATE subject SET subject_id='$subject_id', subject_name='$subject_name' WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Subject Updated Successfully!";
		header('location: ../subject/subject_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../subject/update_subject.php?id='.$id.'');
	}	

}



//================== *Update Subject Ends* ============================//





//================== *Update Session Starts* ============================//


if(isset($_POST['update_session'])) 
{
	$id=$_POST['id'];
	$session_name=$_POST['session_name'];
	$year=$_POST['year'];

	$sql = "UPDATE session SET session_name='$session_name', year='$year' WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Session Updated Successfully!";
		header('location: ../session/session_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../session/update_session.php?id='.$id.'');
	}	

}



//================== *Update Session Ends* ============================//


//================== *Update department Starts* ============================//

if(isset($_POST['update_department'])) 
{
	$id=$_POST['id'];
	$department_name=$_POST['department_name'];


	$sql = "UPDATE department SET department_name='$department_name' WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "department Updated Successfully!";
		header('location: ../department/department_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../department/update_department.php?id='.$id.'');
	}	

}

//================== *Update department Ends* ============================//





//================== *Activate Teacher/Student Starts* ============================//

if(isset($_GET['status']) && isset($_GET['id']) && isset($_GET['type'])) 
{
	$id=$_GET['id'];
	$status=$_GET['status'];
	$type=$_GET['type'];  
	//check if student or teacher
  if ($type == 2) {
		$member_type = "teacher";
	}
	elseif($type == 3){
		$member_type = "student";
	}


	if ($status == 0) {
			$auth = 1;  //To activate 
	}
	elseif($status == 1) {
			$auth = 0;  //To deactivate 
	}
	elseif($status == 2) {
			$auth = 2;  //To reject 
	}


	$sql = "UPDATE registration SET authentication=$auth WHERE member_id='$id'";

	$query = $conn->query($sql);

	if($query === TRUE){

		if($auth == 1){
			//CHECK IF EXISTS ON TEACHER/Student TABLE
			$exist_data = "SELECT * from ".$member_type." where ".$member_type."_id ='$id' and status = 1"; 
	
			$check = $conn->query($exist_data);

					if ($check->num_rows == 0) {
						//If not exists on teacher/student table than get data from registration and insert into// 
							$sql2 = "INSERT into ".$member_type."(".$member_type."_id,name,status,created_at) VALUES ('$id',(SELECT name from registration where member_id='$id' and authentication=1),1,now())"; 
							//table name and member id changed according to user type sent from teacher/student list//
			
							if ($conn->query($sql2) === TRUE) 
							{
								$_SESSION['alert'] = "Activated Successfully!";
								header('location: ../'.$member_type.'/'.$member_type.'_list.php');
							}

					}
					else{
						$_SESSION['alert'] = "Activated Successfully!";
						header('location: ../'.$member_type.'/'.$member_type.'_list.php');
					}
		
		}
		elseif($auth == 0){
			$_SESSION['alert'] = "Deactivated Account Successfully!";
			header('location: ../'.$member_type.'/'.$member_type.'_list.php');
		}
		elseif($auth == 2){
			$_SESSION['alert'] = "Account is rejected!";
			header('location: ../'.$member_type.'/'.$member_type.'_list.php');
		}

	}
	else
	{			
		$_SESSION['alert'] = "Error Occured!";
		header('location: ../'.$member_type.'/'.$member_type.'_list.php');
	}	

}

//================== *Activate Teacher/Student Ends* ============================//






//================== *Update Teacher Start* ============================//

if(isset($_POST['update_teacher'])) 
{
$login_id = $_POST['login_id'];
$teacher_f_id = $_POST['teacher_f_id'];
$teacher_id=$_POST['teacher_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$department=$_POST['department'];
$password=md5($_POST['password']);



if($_POST['password'] != ''){
	$login = "UPDATE login set username= '$username',password='$password' where id =$login_id";
}
else{
	$login = "UPDATE login set username= '$username' where id=$login_id";
}

if ($conn->query($login) === TRUE) 
{
		// $last_id = $conn->insert_id;
		//FOR REGISTRATION FORM//
		$reg = "UPDATE registration set name='$name',department='$department',member_id='$teacher_id' where login_id=$login_id";

		//FOR teacher table
		$teacher = "UPDATE teacher set name='$name',teacher_id='$teacher_id' where id=$teacher_f_id";


		if ($conn->query($reg) === TRUE && $conn->query($teacher) === TRUE) 
		{
			$_SESSION['alert'] = "Update Successful!";
			header('location: ../teacher/teacher_list.php');
		}
		else
		{
				$_SESSION['alert'] = "Update Error Occured!";
				header('location: ../teacher/add_teacher.php');
				
		}	
} 

else
{
		$_SESSION['alert'] = "Update Error Occured!";
		header('location: ../teacher/add_teacher.php');
		
}	

}

//================== *Update Teacher Ends* ============================//




//================== *Update assign teacher Starts* ============================//

elseif(isset($_POST['update_assign_teacher'])) 
{

	$subjects = $_POST['subject'];
	$session = $_POST['session'];
	$section = $_POST['section'];
	$teacher = $_POST['teacher'];
	$id = $_POST['id'];

	// $subject = implode(",",$subjects);  


		$sql = "UPDATE assign_teacher set session_id='$session',subject_id='$subjects',section_id=$section where id=$id";

		if ($conn->query($sql) === TRUE) 
		{
			$_SESSION['alert'] = "Subjects Assigned Successfully!";
			header('location: ../teacher/assign_teacher_list.php');
		}

		else
		{			
				$_SESSION['alert'] = "Error Occured!";
				// echo mysqli_error($conn);
				header('location: ../teacher/update_assign_teacher.php?id='.$id.'');
		}	

	}


//================== *Update assign teacher Ends* ============================//







//================== *Update student Start* ============================//
if (isset($_POST['update_student'])) 
{
$login_id = $_POST['login_id'];
$student_f_id = $_POST['student_f_id'];
$student_id=$_POST['student_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$department=$_POST['department'];
$section=$_POST['section'];
$password=md5($_POST['password']);



if($_POST['password'] != ''){
	$login = "UPDATE login set username= '$username',password='$password' where id =$login_id";
}
else{
	$login = "UPDATE login set username= '$username' where id=$login_id";
}

if ($conn->query($login) === TRUE) 
{
		// $last_id = $conn->insert_id;
		//FOR REGISTRATION FORM//
		$reg = "UPDATE registration set name='$name',section='$section',department='$department',member_id='$student_id' where login_id=$login_id";

		//FOR teacher table
		$student = "UPDATE student set name='$name',student_id='$student_id' where id=$student_f_id";


		if ($conn->query($reg) === TRUE && $conn->query($student) === TRUE) 
		{
			$_SESSION['alert'] = "Update Successful!";
			header('location: ../student/student_list.php');
		}
		else
		{
				$_SESSION['alert'] = "Update Error Occured!";
				header('location: ../student/add_student.php');
				
		}	
} 

else
{
		$_SESSION['alert'] = "Update Error Occured!";
		header('location: ../student/add_student.php');
		
}	

}

//================== *Update student Ends* ============================//




//================== *Update section Starts* ============================//


if(isset($_POST['update_section'])) 
{
	$id=$_POST['id'];
	$section_name=$_POST['section_name'];

	$sql = "UPDATE section SET section_name='$section_name' WHERE id=$id";

	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "section Updated Successfully!";
		header('location: ../section/section_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../section/update_section.php?id='.$id.'');
	}	

}



//================== *Update section Ends* ============================//

//================== *Update No of class starts* ============================//




elseif(isset($_POST['update_no_of_class'])) 
{
	$total_class_number=$_POST['total_class_number'];

	$id=$_POST['id'];

	$sql = "UPDATE assign_class SET number_of_class='$total_class_number' WHERE id=$id";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Number Of Class updated Successfully!";
		header('location: ../class/assigned_subject_list.php');
	}

	else
	{			
			$_SESSION['alert'] = "Error Occured!";
			header('location: ../class/update_class.php?id='.$id.'');
	}	

	
}




//================== *Update No of class ends* ============================//

//================== *Cancel class starts* ============================//

elseif(isset($_GET['class_status']) && isset($_GET['id'])) 
{
if ($_GET['class_status'] == 'cancel') 
{
	$id=$_GET['id'];
	$sql = "UPDATE assign_teacher SET status=0 WHERE id=$id";
	if ($conn->query($sql) === TRUE) 
	{
		$_SESSION['alert'] = "Successfully Canceled!";
		header('location: ../class/assigned_subject_list.php');
	}

	else
	{			
		$_SESSION['alert'] = "Error Occured";
		header('location: ../class/assigned_subject_list.php');
	}	

}
	
}


//================== *Cancel class ends* ============================//
		
?>